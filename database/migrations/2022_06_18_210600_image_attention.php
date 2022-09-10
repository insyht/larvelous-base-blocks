<?php

use App\Block;
use App\BlockVariable;
use Illuminate\Database\Migrations\Migration;

class ImageAttention extends Migration
{
    public function up()
    {
        // blocks
        $imageAttentionBlock = new Block();
        $imageAttentionBlock->resource_id = 'iws_image_attention';
        $imageAttentionBlock->view = 'iws/resources/views/blocks/image_attention';
        $imageAttentionBlock->label = 'ImageAttention';
        $imageAttentionBlock->description = 'Afbeeldingen aandachtstrekker';
        $imageAttentionBlock->save();
        $imageAttentionBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $imageAttentionBlock->id;
        $blockVariable->name = 'image_left';
        $blockVariable->label = 'Linkerafbeelding';
        $blockVariable->type = 'image';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $imageAttentionBlock->id;
        $blockVariable->name = 'image_right_top';
        $blockVariable->label = 'Afbeelding rechtsboven';
        $blockVariable->type = 'image';
        $blockVariable->required = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $imageAttentionBlock->id;
        $blockVariable->name = 'image_right_bottom';
        $blockVariable->label = 'Afbeelding rechtsonder';
        $blockVariable->type = 'image';
        $blockVariable->required = 1;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_image_attention')->delete();
    }
}
