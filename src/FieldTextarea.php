<?php

namespace Adaptcms\FieldTextarea;

use Adaptcms\Base\Models\Package;

class FieldTextarea
{
  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
