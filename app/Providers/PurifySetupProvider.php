<?php

namespace App\Providers;

use HTMLPurifier_HTMLDefinition;
use HTMLPurifier_AttrDef_Enum;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\ServiceProvider;

class PurifySetupProvider extends ServiceProvider
{
    const DEFINITION_ID = 'kanka';
    const DEFINITION_REV = 1;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var \HTMLPurifier $purifier */
        $purifier = Purify::getPurifier();

        /** @var \HTMLPurifier_Config $config */
        $config = $purifier->config;

        $config->set('HTML.DefinitionID', static::DEFINITION_ID);
        $config->set('HTML.DefinitionRev', static::DEFINITION_REV);

        if ($def = $config->maybeGetRawHTMLDefinition()) {
            $this->setupDefinitions($def);
        }

        $css = $config->getCSSDefinition();

        $css->info['word-break'] = new HTMLPurifier_AttrDef_Enum(
            [
                'normal',
                'break-all',
                'keep-all',
                'break-word'
            ]
        );
        //dd($css);

        $purifier->config = $config;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Adds elements and attributes to the HTML purifier
     * definition required by the trix editor.
     *
     * @param HTMLPurifier_HTMLDefinition $def
     */
    protected function setupDefinitions(HTMLPurifier_HTMLDefinition $def)
    {
        $def->addElement('figure', 'Inline', 'Inline', 'Common');
        $def->addAttribute('figure', 'class', 'Text');

        $def->addElement('figcaption', 'Inline', 'Inline', 'Common');
        $def->addAttribute('figcaption', 'class', 'Text');

        // For our mentions
        $def->addAttribute('a', 'data-toggle', 'Text');
        $def->addAttribute('a', 'data-html', 'Text');

        //$def->addAttribute('span', 'word-break')

        $def->addElement(
            'details',
            'Block',
            'Flow',
            'Common',
            array(
                'open' => new \HTMLPurifier_AttrDef_HTML_Bool(true)
            )
        );
        $def->addElement('summary', 'Inline', 'Inline', 'Common');
    }
}
