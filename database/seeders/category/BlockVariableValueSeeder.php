<?php

namespace Iws\Database\Seeders\Category;

use App\Block;
use App\BlockTemplate;
use App\BlockVariable;
use App\BlockVariableValue;
use App\BlockVariableValueTemplateBlock;
use App\Language;
use App\Template;
use Illuminate\Database\Seeder;

class BlockVariableValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where('name', 'Nederlands')->first();

        $heroBlock = Block::where('resource_id', 'iws_hero')->first();

        $heroImageBlockVariable = BlockVariable::where('name', 'image')->where('block_id', $heroBlock->id)->first();
        $heroTextBlockVariable = BlockVariable::where('name', 'text')->where('block_id', $heroBlock->id)->first();

        $template = Template::where('resource_id', 'iws_category')->first();
        $baseHeroTemplateBlock = BlockTemplate::where('block_id', $heroBlock->id)
                                          ->where('template_id', $template->id)
                                          ->first();

        $blockVariableValue = new BlockVariableValue();
        $blockVariableValue->block_variable_id = $heroImageBlockVariable->id;
        $blockVariableValue->language_id = $language->id;
        $blockVariableValue->value = 'images/placeholder.jpg';
        $blockVariableValue->save();
        $blockVariableValue->refresh();
        $blockVariableValueTemplateBlock = new BlockVariableValueTemplateBlock();
        $blockVariableValueTemplateBlock->block_variable_value_id = $blockVariableValue->id;
        $blockVariableValueTemplateBlock->template_block_id = $baseHeroTemplateBlock->id;
        $blockVariableValueTemplateBlock->ordering = 1;
        $blockVariableValueTemplateBlock->save();

        $blockVariableValue = new BlockVariableValue();
        $blockVariableValue->block_variable_id = $heroTextBlockVariable->id;
        $blockVariableValue->language_id = $language->id;
        $blockVariableValue->value = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ullamcorper, purus a volutpat euismod, risus orci ultrices turpis, ut ornare elit quam tristique felis. Sed ac mauris efficitur, tempor ante ac, venenatis magna. Vestibulum eget faucibus mauris, et condimentum nibh. Duis gravida augue id pharetra semper. Cras imperdiet, purus non imperdiet ultricies, odio odio venenatis felis, vitae tempor tortor turpis eu turpis.';
        $blockVariableValue->save();
        $blockVariableValue->refresh();
        $blockVariableValueTemplateBlock = new BlockVariableValueTemplateBlock();
        $blockVariableValueTemplateBlock->block_variable_value_id = $blockVariableValue->id;
        $blockVariableValueTemplateBlock->template_block_id = $baseHeroTemplateBlock->id;
        $blockVariableValueTemplateBlock->ordering = 2;
        $blockVariableValueTemplateBlock->save();
    }
}
