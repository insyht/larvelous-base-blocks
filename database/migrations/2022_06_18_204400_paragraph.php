<?php

use App\Block;
use App\BlockVariable;
use App\BlockVariableOption;
use Illuminate\Database\Migrations\Migration;

class Paragraph extends Migration
{
    public function up()
    {
        // blocks
        $paragraphBlock = new Block();
        $paragraphBlock->resource_id = 'iws_paragraph';
        $paragraphBlock->view = 'iws/resources/views/blocks/paragraph';
        $paragraphBlock->label = 'Alinea';
        $paragraphBlock->description = 'Alinea';
        $paragraphBlock->save();
        $paragraphBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'Titel';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'Tekst';
        $blockVariable->type = 'textarea';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'Afbeelding';
        $blockVariable->type = 'image';
        $blockVariable->required = 0;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'url';
        $blockVariable->label = 'Url';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 0;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $paragraphBlock->id;
        $blockVariable->name = 'url_text';
        $blockVariable->label = 'Url tekst';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 0;
        $blockVariable->save();

        $imagePositionBlockVariable = new BlockVariable();
        $imagePositionBlockVariable->block_id = $paragraphBlock->id;
        $imagePositionBlockVariable->name = 'image_position';
        $imagePositionBlockVariable->label = 'Afbeeldingspositie';
        $imagePositionBlockVariable->type = 'dropdown';
        $imagePositionBlockVariable->required = 0;
        $imagePositionBlockVariable->save();
        $imagePositionBlockVariable->refresh();

        // block_variable_options
        $blockVariableOption = new BlockVariableOption();
        $blockVariableOption->block_variable_id = $imagePositionBlockVariable->id;
        $blockVariableOption->label = 'Links';
        $blockVariableOption->value = 'left';
        $blockVariableOption->save();
        $blockVariableOption = new BlockVariableOption();
        $blockVariableOption->block_variable_id = $imagePositionBlockVariable->id;
        $blockVariableOption->label = 'Rechts';
        $blockVariableOption->value = 'right';
        $blockVariableOption->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_paragraph')->delete();
    }
}
