<?php

use Insyht\Larvelous\Models\Block;
use Insyht\Larvelous\Models\BlockTemplate;
use Insyht\Larvelous\Models\BlockVariable;
use Insyht\Larvelous\Models\BlockVariableType;
use Insyht\Larvelous\Models\Template;
use Illuminate\Database\Migrations\Migration;

class LandingPage extends Migration
{
    public function up()
    {
        $template = new Template();
        $template->resource_id = 'iws_landing_page';
        $template->label = 'Landing page';
        $template->view = 'insyht-larvelous::landingpage';
        $template->save();
        $template->refresh();

        // Header block
        $landingPageHeaderBlock = new Block();
        $landingPageHeaderBlock->resource_id = 'iws_landing_page_header';
        $landingPageHeaderBlock->view = 'insyht-larvelous-base-blocks::blocks.landing_page_header';
        $landingPageHeaderBlock->label = 'Landing page header';
        $landingPageHeaderBlock->description = 'A header with a title, subtitle, text, quote, link button and background image';
        $landingPageHeaderBlock->save();
        $landingPageHeaderBlock->refresh();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'cms.title';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'subtitle';
        $blockVariable->label = 'cms.subtitle';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 2;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'cms.text';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 1;
        $blockVariable->ordering = 3;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'quote';
        $blockVariable->label = 'cms.quote';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 0;
        $blockVariable->ordering = 4;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'quote_name';
        $blockVariable->label = 'cms.name';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 5;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'quote_city';
        $blockVariable->label = 'cms.city';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 6;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'url';
        $blockVariable->label = 'cms.url';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 7;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'url_text';
        $blockVariable->label = 'cms.urlText';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 0;
        $blockVariable->ordering = 8;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $landingPageHeaderBlock->id;
        $blockVariable->name = 'image';
        $blockVariable->label = 'cms.image';
        $blockVariable->type = BlockVariableType::TYPE_IMAGE;
        $blockVariable->required = 0;
        $blockVariable->ordering = 9;
        $blockVariable->save();

        // Image tetralogy block
        $tetralogyBlock = new Block();
        $tetralogyBlock->resource_id = 'iws_image_tetralogy';
        $tetralogyBlock->view = 'insyht-larvelous-base-blocks::blocks.image_tetralogy';
        $tetralogyBlock->label = 'Image Tetralogy';
        $tetralogyBlock->description = 'A title with four images';
        $tetralogyBlock->save();
        $tetralogyBlock->refresh();

        $variable = new BlockVariable();
        $variable->block_id = $tetralogyBlock->id;
        $variable->name = 'title';
        $variable->label = 'cms.title';
        $variable->type = BlockVariableType::TYPE_TEXTFIELD;
        $variable->required = 1;
        $variable->ordering = 1;

        for ($i = 2; $i <= 5; $i++) {
            $blockVariable = new BlockVariable();
            $blockVariable->block_id = $tetralogyBlock->id;
            $blockVariable->name = 'image';
            $blockVariable->label = 'cms.image';
            $blockVariable->type = BlockVariableType::TYPE_IMAGE;
            $blockVariable->required = 1;
            $blockVariable->ordering = $i;
            $blockVariable->save();
        }

        // Title+text block
        $titleTextBlock = new Block();
        $titleTextBlock->resource_id = 'iws_title_text';
        $titleTextBlock->view = 'insyht-larvelous-base-blocks::blocks.title_text';
        $titleTextBlock->label = 'Title + text';
        $titleTextBlock->description = 'Title and a text';
        $titleTextBlock->save();
        $titleTextBlock->refresh();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $titleTextBlock->id;
        $blockVariable->name = 'title';
        $blockVariable->label = 'cms.title';
        $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
        $blockVariable->required = 1;
        $blockVariable->ordering = 1;
        $blockVariable->save();

        $blockVariable = new BlockVariable();
        $blockVariable->block_id = $titleTextBlock->id;
        $blockVariable->name = 'text';
        $blockVariable->label = 'cms.text';
        $blockVariable->type = BlockVariableType::TYPE_TEXTAREA;
        $blockVariable->required = 1;
        $blockVariable->ordering = 2;
        $blockVariable->save();

        $uspsBlock = new Block();
        $uspsBlock->resource_id = 'iws_usps';
        $uspsBlock->view = 'insyht-larvelous-base-blocks::blocks.usps';
        $uspsBlock->label = 'USPs';
        $uspsBlock->description = 'Three USPs';
        $uspsBlock->save();
        $uspsBlock->refresh();

        for ($i = 1; $i <= 3; $i++) {
            $blockVariable = new BlockVariable();
            $blockVariable->block_id = $uspsBlock->id;
            $blockVariable->name = 'icon';
            $blockVariable->label = 'cms.icon';
            $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
            $blockVariable->required = 1;
            $blockVariable->ordering = $i;
            $blockVariable->save();

            $blockVariable = new BlockVariable();
            $blockVariable->block_id = $uspsBlock->id;
            $blockVariable->name = 'title';
            $blockVariable->label = 'cms.title';
            $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
            $blockVariable->required = 1;
            $blockVariable->ordering = $i = 1;
            $blockVariable->save();

            $blockVariable = new BlockVariable();
            $blockVariable->block_id = $uspsBlock->id;
            $blockVariable->name = 'text';
            $blockVariable->label = 'cms.text';
            $blockVariable->type = BlockVariableType::TYPE_TEXTFIELD;
            $blockVariable->required = 1;
            $blockVariable->ordering = $i + 2;
            $blockVariable->save();
        }

        // Link blocks to template
        $blockTemplate = new BlockTemplate();
        $blockTemplate->template_id = $template->id;
        $blockTemplate->block_id = $landingPageHeaderBlock->id;
        $blockTemplate->enabled = 1;
        $blockTemplate->ordering = 1;
        $blockTemplate->save();

        $blockTemplate = new BlockTemplate();
        $blockTemplate->template_id = $template->id;
        $blockTemplate->block_id = $tetralogyBlock->id;
        $blockTemplate->enabled = 1;
        $blockTemplate->ordering = 2;
        $blockTemplate->save();

        $blockTemplate = new BlockTemplate();
        $blockTemplate->template_id = $template->id;
        $blockTemplate->block_id = $titleTextBlock->id;
        $blockTemplate->enabled = 1;
        $blockTemplate->ordering = 3;
        $blockTemplate->save();

        $blockTemplate = new BlockTemplate();
        $blockTemplate->template_id = $template->id;
        $blockTemplate->block_id = $uspsBlock->id;
        $blockTemplate->enabled = 1;
        $blockTemplate->ordering = 4;
        $blockTemplate->save();

        $paragraphBlock = Block::where('resource_id', 'iws_paragraph')->first();
        for ($i = 6; $i <= 9; $i++) {
            $blockTemplate = new BlockTemplate();
            $blockTemplate->template_id = $template->id;
            $blockTemplate->block_id = $paragraphBlock->id;
            $blockTemplate->enabled = 1;
            $blockTemplate->ordering = $i;
            $blockTemplate->save();
        }

        $blockTemplate = new BlockTemplate();
        $blockTemplate->template_id = $template->id;
        $blockTemplate->block_id = Block::where('resource_id', 'iws_cta')->first()->id;
        $blockTemplate->enabled = 1;
        $blockTemplate->ordering = 10;
        $blockTemplate->save();
    }

    public function down()
    {
        // Foreign key constraints will remove the rest automatically
        Block::where('resource_id', 'iws_landing_page_header')->delete();
    }
}
