<?php

namespace Drutiny\Audit\Drupal;

use Drutiny\Audit;
use Drutiny\Sandbox\Sandbox;

/**
 * Ensure all module updates have been applied.
 */
class UpdateDBStatus extends Audit {

  /**
   * @inheritdoc
   */
  public function audit(Sandbox $sandbox) {
    $output = $sandbox->drush()->updb('-n');

    if (strpos($output, 'No database updates required') >= 0 || empty($output)) {
      return TRUE;
    }
    return FALSE;
  }

}
