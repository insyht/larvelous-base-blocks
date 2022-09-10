<?php

use App\Block;
use App\BlockVariable;
use Illuminate\Database\Migrations\Migration;

class Newsletter extends Migration
{
    public function up()
    {
        // blocks
        $newsletterBlock = new Block();
        $newsletterBlock->resource_id = 'iws_newsletter';
        $newsletterBlock->view = 'iws/resources/views/blocks/newsletter';
        $newsletterBlock->label = 'Newsletter';
        $newsletterBlock->description = 'Nieuwsbrief';
        $newsletterBlock->save();
        $newsletterBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'image_left';
        $blockVariable->label = 'Linkerafbeelding';
        $blockVariable->type = 'image';
        $blockVariable->required = 0;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $newsletterBlock->id;
        $blockVariable->name = 'image_right';
        $blockVariable->label = 'Rechterafbeelding';
        $blockVariable->type = 'image';
        $blockVariable->required = 0;
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
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_newsletter')->delete();
    }
}
