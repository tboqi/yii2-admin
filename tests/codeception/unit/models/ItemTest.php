<?php

namespace tests\codeception\unit\models;

use app\modules\admin\models\AuthItem;
use Codeception\Specify;
use tests\codeception\unit\TestCase;

class ItemTest extends TestCase
{

    use Specify;

    public function testAddNew()
    {
        $model = new AuthItem();
        $model->attributes = [
            'type' => 1,
        ];
        // required
        $this->assertFalse($model->validate());

        $model = new AuthItem();
        $model->attributes = [
            'name' => 'Tester',
            'type' => 1,
        ];
        $this->assertTrue($model->validate());
        $model->save();

        $model = new AuthItem();
        $model->attributes = [
            'name' => 'Tester',
            'type' => 1,
        ];
        // not unique
        $this->assertFalse($model->validate());
    }
}
