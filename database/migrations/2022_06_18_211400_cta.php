<?php

use App\Models\Block;
use App\Models\BlockVariable;
use App\Models\BlockVariableType;
use Illuminate\Database\Migrations\Migration;

class Cta extends Migration
{
    public function up()
    {
        // blocks
        $newsletterBlock = new Block();
        $newsletterBlock->resource_id = 'iws_cta';
        $newsletterBlock->view = 'insyht/larvelous-base-blocks/resources/views/blocks/cta';
        $newsletterBlock->label = 'Call to action';
        $newsletterBlock->description = 'Call to action';
        $newsletterBlock->save();
        $newsletterBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'email';
        $blockVariable->label = 'cms.emailAddress';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'function';
        $blockVariable->label = 'cms.function';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 2;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'cms.image';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 1;
        $blockVariable->ordering = 3;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'name';
        $blockVariable->label = 'cms.name';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 4;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'phone_number';
        $blockVariable->label = 'cms.phoneNumber';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 5;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'cms.text';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 1;
        $blockVariable->ordering = 6;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'cms.title';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 7;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'url';
        $blockVariable->label = 'cms.url';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 8;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'url_text';
        $blockVariable->label = 'cms.urlText';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 9;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_cta')->delete();
    }
}
