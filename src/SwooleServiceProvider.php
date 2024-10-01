<?php

namespace ManoCode\Swoole;

use ManoCode\CustomExtend\Extend\ManoCodeServiceProvider;
use Slowlyo\OwlAdmin\Renderers\TextControl;

class SwooleServiceProvider extends ManoCodeServiceProvider
{
    public function settingForm()
    {
        return $this->baseSettingForm()->body([
            amis()->Tabs()->tabs([
                [
                    'title' => '基础设置',
                    'body' => $this->baseSettingForm()->body([
//                        TextControl::make()->name('app_id')->label('应用ID')->required(true),
//                        TextControl::make()->name('app_secret')->label('应用秘钥')->required(true),
                    ]),
                ],])])->actions([]);
    }
}
