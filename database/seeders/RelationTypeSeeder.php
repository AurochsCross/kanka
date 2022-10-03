<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RelationType;

class RelationTypeSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $themes = ['all', 'spouse', 'ex-spouse', 'parent', 'child'];
        $created = 0;
        foreach ($themes as $theme) {
            $type = RelationType::firstOrNew([
                'code' => $theme,
            ]);
            if (!$type->exists) {
                $type->fill([
                    'code' => $theme,
                ])->save();
                $created++;
            }
        }
    }
}
