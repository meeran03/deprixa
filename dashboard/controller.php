<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

  define("_VALID_PHP", true);
  
  require_once("../init.php");
	
?>

<?php
  
  require_once("vendor/Controllers/plugins.php");

  /* == User Search == */
  if (isset($_POST['userSearch'])):
      $string = sanitize($_POST['userSearch'], 15);

      if (strlen($string) > 3):
          $sql = "SELECT id, username, email, CONCAT(fname,' ',lname) as name" 
		  . "\n FROM users" 
		  . "\n WHERE MATCH (username) AGAINST ('" . $db->escape($string) . "*' IN BOOLEAN MODE)" 
		  . "\n ORDER BY username LIMIT 10";
          $display = '';
          if ($result = $db->fetch_all($sql)):
              $display .= '<ul id="searchresults">';
              foreach ($result as $row):
                  $link = 'index.php?do=users&amp;action=edit&amp;id=' . (int)$row->id;
                  $display .= '<li> <a href="' . $link . '"><p><i class="icon-chevron-sign-right"></i> ' . $row->username . ' - ' . $row->name . '</p>' . $row->email . '</a></li>';
              endforeach;
              $display .= '</ul>';
              print $display;
          endif;
      endif;
  endif;

  /* == Site Maintenance == */
  if (isset($_POST['processMaintenance'])):
      if (isset($_POST['inactive'])):
          $now = date('Y-m-d H:i:s');
          $diff = intval($_POST['days']);
          $expire = date("Y-m-d H:i:s", strtotime($now . -$diff . " days"));
          $db->delete("users", "lastlogin < '" . $expire . "' AND active = 'y' AND userlevel !=9");

          print ($db->affected()) ? Filter::msgOk('All (' . $db->affected() . ') inactive user(s) deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');

      elseif (isset($_POST['banned'])):
          $db->delete("users", "active = 'b'");
          print ($db->affected()) ? Filter::msgOk('All banned users deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
      endif;
  endif;
  
  /* == Delete SQL Backup == */
  if (isset($_POST['deleteBackup'])):
      $action = @unlink(BASEPATH . 'dashboard/backups/' . sanitize($_POST['deleteBackup']));

      print ($action) ? Filter::msgOk('<span>Success!</span>Backup deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;

  /* == Latest Sales Stats == */
  if (isset($_GET['getSaleStats'])):
      if (intval($_GET['getSaleStats']) == 0 || empty($_GET['getSaleStats'])):
          die();
      endif;

      $range = (isset($_GET['timerange'])) ? sanitize($_GET['timerange']) : 'month';
      $data = array();
      $data['order'] = array();
      $data['xaxis'] = array();
      $data['order']['label'] = '&nbsp;&nbsp;User Statistics';

      switch ($range) {
          case 'day':
              $date = date('Y-m-d');
              for ($i = 0; $i < 24; $i++) {
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE DATE(created) = '" . $db->escape($date) . "'" 
				  . "\n AND HOUR(created) = '" . (int)$i . "'" 
				  . "\n GROUP BY HOUR(created) ORDER BY created ASC");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('H', mktime($i, 0, 0, date('n'), date('j'), date('Y'))));
              }
              break;
          case 'week':
              $date_start = strtotime('-' . date('w') . ' days');

              for ($i = 0; $i < 7; $i++) {
                  $date = date('Y-m-d', $date_start + ($i * 86400));
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE DATE(created) = '" . $db->escape($date) . "'" 
				  . "\n GROUP BY DATE(created)");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('D', strtotime($date)));
              }

              break;
          default:
          case 'month':
              for ($i = 1; $i <= date('t'); $i++) {
                  $date = date('Y') . '-' . date('m') . '-' . $i;
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE (DATE(created) = '" . $db->escape($date) . "')" 
				  . "\n GROUP BY DAY(created)");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('j', strtotime($date)));
              }
              break;
          case 'year':
              for ($i = 1; $i <= 12; $i++) {
                  $query = $db->first("SELECT COUNT(*) AS total FROM users" 
				  . "\n WHERE YEAR(created) = '" . date('Y') . "'" 
				  . "\n AND MONTH(created) = '" . $i . "'" 
				  . "\n GROUP BY MONTH(created)");

                  ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                  $data['xaxis'][] = array($i, date('M', mktime(0, 0, 0, $i, 1, date('Y'))));
              }
              break;
      }

      print json_encode($data);
  endif;
?>