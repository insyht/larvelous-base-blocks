<?php

use App\Models\Block;
use App\Models\BlockVariable;
use App\Models\BlockVariableType;
use Illuminate\Database\Migrations\Migration;

class Hero extends Migration
{
    public function up()
    {
        // blocks
        $heroImageBlock = new Block();
        $heroImageBlock->resource_id = 'iws_hero';
        $heroImageBlock->view = 'insyht/larvelous-base-blocks/resources/views/blocks/hero';
        $heroImageBlock->label = 'Hero';
        $heroImageBlock->description = 'A large image with some text below it, usually at the top of the page';
        $heroImageBlock->save();
        $heroImageBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $heroImageBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'cms.image';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 1;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $heroImageBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'cms.text';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 0;
        $blockVariable->ordering = 2;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_hero')->delete();
    }
}
