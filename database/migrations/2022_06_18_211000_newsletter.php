<?php

use Insyht\Larvelous\Models\Block;
use Insyht\Larvelous\Models\BlockVariable;
use Insyht\Larvelous\Models\BlockVariableType;
use Illuminate\Database\Migrations\Migration;

class Newsletter extends Migration
{
    public function up()
    {
        // blocks
        $newsletterBlock = new Block();
        $newsletterBlock->resource_id = 'iws_newsletter';
        $newsletterBlock->view = 'insyht-larvelous-base-blocks::blocks.newsletter';
        $newsletterBlock->label = 'Newsletter';
        $newsletterBlock->description = 'Nieuwsbrief';
        $newsletterBlock->save();
        $newsletterBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'image_left';
        $blockVariable->label = 'cms.leftImage';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 0;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'image_right';
        $blockVariable->label = 'cms.rightImage';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 0;
        $blockVariable->ordering = 2;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'cms.text';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 1;
        $blockVariable->ordering = 3;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'cms.title';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 4;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_newsletter')->delete();
    }
}
