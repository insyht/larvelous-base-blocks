<?php

use App\Block;
use App\BlockVariable;
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
        $blockVariable->label = 'E-mailadres';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 0;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'function';
        $blockVariable->label = 'Functie';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 0;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'Afbeelding';
        $blockVariable->type = 'image';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'name';
        $blockVariable->label = 'Naam';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'phone_number';
        $blockVariable->label = 'Telefoonnummer';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'Tekst';
        $blockVariable->type = 'textarea';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'Titel';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'url';
        $blockVariable->label = 'Url';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'url_text';
        $blockVariable->label = 'Url tekst';
        $blockVariable->type = 'textfield';
        $blockVariable->required = 1;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_cta')->delete();
    }
}
