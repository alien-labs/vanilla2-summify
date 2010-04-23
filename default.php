<?php

if(!defined('APPLICATION')) die();

$PluginInfo['Summify'] = array(
  'Name' => 'Summify',
  'Description' => 'Install the Summify link summarization and preview widget. '
    .'You must configure summifyClientId in the module\'s default.php.',
  'Version' => '1.0',
  'Author' => 'Cristian Strat',
  'AuthorUrl' => 'http://summify.com',
  'RequiredApplications' => array('Vanilla' => '>=2.0'),
);

class SummifyWidget implements Gdn_IPlugin
{
  // Match this param to the value in your Summify dashboard snippet code.
  // Go to http://summify.com/dashboard/ and look at the generated code.
  // Example:
  //   If your code looks like this
  //   <script type="text/javascript" src="http://summify.com/client/v1/2100ad/client.js"></script>
  //   Then your summifyClientId is:
  //   2100ad
  public $summifyClientId = 'CHANGE-THIS';

  public function Base_AfterBody_Handler(&$Controller)
  {
    if ($this->summifyClientId && $this->summifyClientId != 'CHANGE-THIS') {
      $scriptSrc = 'http://summify.com/client/v1/' . $this->summifyClientId
          . '/client.js';
      echo '<script type="text/javascript" src="', $scriptSrc, '"></script>';
    }
  }

  public function Setup()
  {
  }
}

?>
