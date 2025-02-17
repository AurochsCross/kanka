<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImgService
{
    /** @var string  */
    protected $crop = '';

    /** @var bool If true, running locally with docker/minio */
    protected bool $local = false;

    /** @var bool Called from console */
    protected $console = false;

    /** @var string user or app */
    protected $base;

    /** @var string s3 url */
    protected $s3;

    /** @var bool */
    protected $enabled;

    protected $focusX;
    protected $focusY;

    public function __construct()
    {
        $this->enabled = !empty(config('thumbor.key'));
        $this->local = config('thumbor.key') === 'local';
    }

    /**
     * @return $this
     */
    public function console(): self
    {
        $this->console = true;
        return $this;
    }

    /**
     * @param int $width
     * @param int $height
     * @return $this
     */
    public function crop(int $width, int $height): self
    {
        if ($width !== 0) {
            $this->crop = "{$width}x{$height}/";
        }
        return $this;
    }

    /**
     * @param int $x
     * @param int $y
     * @return $this
     */
    public function focus(int $x, int $y): self
    {
        $this->focusX = $x;
        $this->focusY = $y;
        return $this;
    }

    /**
     * @return $this
     */
    public function resetCrop(): self
    {
        $this->crop = '';
        return $this;
    }

    /**
     * @param string|null $base
     * @return $this
     */
    public function base(string|null $base = 'user'): self
    {
//        if (!empty($this->s3)) {
//            return $this;w
//        }
        $this->base = $base;
        if ($base === 'app') {
            $this->s3 = config('thumbor.bases.app');
        } else {
            $this->s3 = config('thumbor.bases.user');
        }
        return $this;
    }

    /**
     * @param string $img
     * @return string
     */
    public function url(string $img): string
    {
        if (!$this->enabled || Str::contains($img, '?') || Str::endsWith($img, '.svg')) {
            return Storage::url($img);
        }

        // Default base
        if(!$this->console) {
            $this->base();
        }

        $img = Str::before($img, '?');
        $full = $this->s3 . $img;
        $filter = 'smart/';
        if (!empty($this->focusX)) {
            // left x top:right x bottom
            $filter = 'filters:focal(' . ($this->focusX - 10) . 'x' . ($this->focusY - 10) . ':' . ($this->focusX + 10) . 'x' . ($this->focusY + 10) . ')/';
            $this->focusX = $this->focusY = null;
        }
        $thumborUrl = $this->crop . $filter . $full;
        $sign = $this->sign($thumborUrl);

        // If we're on a local instance, it's a lot easier, everything is in minio
        if ($this->local) {
            return config('thumbor.url') . 'unsafe/' . $this->crop . $filter
                . app()->environment() . '/' . urlencode($img);
        }

        return config('thumbor.url') . $this->base . '/' . $sign . '/' . $this->crop . $filter
            . 'src/' . urlencode($img)
        ;
    }

    /**
     * @param string $url
     * @return string
     */
    protected function sign(string $url): string
    {
        $signature = hash_hmac('sha1', $url, config('thumbor.key'), true);
        return strtr(base64_encode($signature), '/+', '_-');
    }
}
