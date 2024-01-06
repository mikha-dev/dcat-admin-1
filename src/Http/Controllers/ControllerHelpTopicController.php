<?php

namespace Dcat\Admin\Http\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Models\ControllerHelpTopic;
use Dcat\Admin\Http\Controllers\AdminController;

class ControllerHelpTopicController extends AdminController
{
    protected function grid() {
        return function (Row $row) {  $row->column(8, $this->_grid());};
    }

    protected function _grid()
    {

        return new Grid( new ControllerHelpTopic(), function (Grid $grid) {

            $grid->column('controller_name')->editable();
            $grid->column('topic_url')->editable();

            $grid->quickSearch(['controller_name', 'topic_url']);
            $grid->disableViewButton();
            $grid->enableDialogCreate();
        });
    }

    protected function form()
    {
        return new Form( new ControllerHelpTopic(), function (Form $form) {

            $form->text('controller_name')->required();
            $form->text('topic_url')->required();

            $form->disableViewButton();
        });
    }
}
