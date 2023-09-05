<?php

use Insyht\Larvelous\Models\Block;
use Insyht\Larvelous\Models\BlockVariable;
use Insyht\Larvelous\Models\BlockVariableType;
use Illuminate\Database\Migrations\Migration;

class ImageAttention extends Migration
{
    public function up()
    {
        // blocks
        $imageAttentionBlock = new Block();
        $imageAttentionBlock->resource_id = 'iws_image_attention';
        $imageAttentionBlock->view = 'insyht/larvelous-base-blocks/resources/views/blocks/image_attention';
        $imageAttentionBlock->label = 'ImageAttention';
        $imageAttentionBlock->description = 'Afbeeldingen aandachtstrekker';
        $imageAttentionBlock->save();
        $imageAttentionBlock->refresh();

        // blocks_variables
        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $imageAttentionBlock->id;
        $blockVariable->name = 'image_left';
        $blockVariable->label = 'cms.leftImage';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 1;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $imageAttentionBlock->id;
        $blockVariable->name = 'image_right_top';
        $blockVariable->label = 'cms.imageRightTop';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 1;
        $blockVariable->ordering = 2;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $imageAttentionBlock->id;
        $blockVariable->name = 'image_right_bottom';
        $blockVariable->label = 'cms.imageRightBottom';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 1;
        $blockVariable->ordering = 3;
        $blockVariable->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_image_attention')->delete();
    }
}
