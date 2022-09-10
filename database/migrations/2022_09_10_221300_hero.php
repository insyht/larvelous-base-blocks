<?php

use App\Block;
use App\BlockVariable;
use Illuminate\Database\Migrations\Migration;

class Hero extends Migration
{
    public function up()
    {
        // blocks
        $heroImageBlock = new Block();
        $heroImageBlock->resource_id = 'iws_hero';
        $heroImageBlock->view = 'iws/resources/views/blocks/hero';
        $heroImageBlock->label = 'Hero';
        $heroImageBlock->description = 'A large image with some text below it, usually at the top of the page';
        $heroImageBlock->save();
        $heroImageBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $heroImageBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'Afbeelding';
        $blockVariable->type = 'image';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $heroImageBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'Tekst';
        $blockVariable->type = 'textarea';
        $blockVariable->required = 0;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_hero')->delete();
    }
}
