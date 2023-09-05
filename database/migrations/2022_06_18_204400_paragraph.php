<?php

use Insyht\Larvelous\Models\Block;
use Insyht\Larvelous\Models\BlockVariable;
use Insyht\Larvelous\Models\BlockVariableOption;
use Insyht\Larvelous\Models\BlockVariableType;
use Illuminate\Database\Migrations\Migration;

class Paragraph extends Migration
{
    public function up()
    {
        // blocks
        $paragraphBlock = new Block();
        $paragraphBlock->resource_id = 'iws_paragraph';
        $paragraphBlock->view = 'insyht/larvelous-base-blocks/resources/views/blocks/paragraph';
        $paragraphBlock->label = 'Alinea';
        $paragraphBlock->description = 'Alinea';
        $paragraphBlock->save();
        $paragraphBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'cms.title';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'cms.text';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 2;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'cms.image';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 0;
        $blockVariable->ordering = 3;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'url';
        $blockVariable->label = 'cms.url';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 4;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'url_text';
        $blockVariable->label = 'cms.urlText';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 5;
        $blockVariable->save();

        $imagePositionBlockVariable = new BlockVariable();
        $imagePositionBlockVariable->block_id = $paragraphBlock->id;
        $imagePositionBlockVariable->name = 'image_position';
        $imagePositionBlockVariable->label = 'cms.imagePosition';
        $imagePositionBlockVariable->type = BlockVariableType::TYPE_DROPDOWN;
        $imagePositionBlockVariable->required = 0;
        $imagePositionBlockVariable->ordering = 6;
        $imagePositionBlockVariable->save();
        $imagePositionBlockVariable->refresh();

        // block_variable_options
        $blockVariableOption = new BlockVariableOption();
        $blockVariableOption->block_variable_id = $imagePositionBlockVariable->id;
        $blockVariableOption->label = 'cms.links';
        $blockVariableOption->value = 'left';
        $blockVariableOption->save();
        $blockVariableOption = new BlockVariableOption();
        $blockVariableOption->block_variable_id = $imagePositionBlockVariable->id;
        $blockVariableOption->label = 'cms.right';
        $blockVariableOption->value = 'right';
        $blockVariableOption->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_paragraph')->delete();
    }
}
