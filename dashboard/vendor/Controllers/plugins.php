?><?php //(time()>1587340800)?exit('Your 7 day trial of SourceCop has expired. Please visit http://www.sourcecop.com to purchase a license.'):'';?><?php


//Change the file dashboard/vendor/Controllers/plugins.php
//Copy and paste this completely without changing anything it will work perfectly 
//contact mayahn2082@gmail.com
//
/* Proccess Configuration */
  if (isset($_POST['processConfig'])):
      $core->processConfig();
  endif;
  
  /* Proccess Configuration general */
  if (isset($_POST['processConfig_general'])):
      $core->processConfig_general();
  endif;
  
   /* Proccess Configuration payment */
  if (isset($_POST['processConfig_payment'])):
      $core->processConfig_payment();
  endif;
  
   /* Proccess processConfig_apigooglekey */
  if (isset($_POST['processConfig_apigooglekey'])):
      $core->processConfig_apigooglekey();
  endif;
  
  /* Proccess Configuration taxes and fees */
  if (isset($_POST['processConfig_taxes'])):
      $core->processConfig_taxes();
  endif;
  
  /* Proccess Configuration track and invoice */
  if (isset($_POST['processConfig_track_invoice'])):
      $core->processConfig_track_invoice();
  endif;
  
  /* == Proccess Courier == */
  if (isset($_POST['processCourier'])):
      $courier->processCourier();
  endif;
  
  /* == Proccess Courier == */
  if (isset($_POST['processCourierq'])):
      $courier->processCourierq();
  endif;
  
  /* == Proccess Pick == */
  if (isset($_POST['processPickup'])):
      $courier->processPickup();
  endif;

  /* == Proccess Pick up client == */
  if (isset($_POST['processPickupclient'])):
      $courier->processPickupclient();
  endif;
  
  /* == Proccess Quote == */
  if (isset($_POST['processQuote'])):
      $courier->processQuote();
  endif;
  
  /* == Proccess Quote Approved == */
  if (isset($_POST['processQuoteapproved'])):
      $courier->processQuoteapproved();
  endif;
  
  /* == Proccess Container == */
  if (isset($_POST['processContainer'])):
      $courier->processContainer();
  endif;
  
  /* == Proccess Custom Novelty == */
  if (isset($_POST['processNovelty'])):
      $courier->processNovelty();
  endif;
  
  /* == Proccess Custom Novelty update == */
  if (isset($_POST['processNoveltyupdate'])):
      $courier->processNoveltyupdate();
  endif;
  
   /* == Proccess Consolidate == */
  if (isset($_POST['processConsolidate'])):
      $courier->processConsolidate();
  endif;
  
  /* == Proccess Container update == */
  if (isset($_POST['processContainer_update'])):
      $courier->processContainer_update();
  endif;
  
  /* == Proccess Container update == */
  if (isset($_POST['processConsolidate_update'])):
      $courier->processConsolidate_update();
  endif;
  
  /* == Proccess Update Courier == */
  if (isset($_POST['processUCourier'])):
      $courier->processUCourier();
  endif;
  
  /* == Proccess Update Courier pre alerta== */
  if (isset($_POST['processUCourierpre'])):
      $courier->processUCourierpre();
  endif;
  
  /* == Proccess Update Quote == */
  if (isset($_POST['processUQuote'])):
      $courier->processUQuote();
  endif;
  
   /* == Proccess Update Pickup == */
  if (isset($_POST['processUpdatePickup'])):
      $courier->processUpdatePickup();
  endif;
  
  /* == Proccess Rejected Courier == */
  if (isset($_POST['processCourierrejected'])):
      $courier->processCourierrejected();
  endif;
  
  /* == Proccess Update Courier Status == */
  if (isset($_POST['processStatusCourier'])):
      $courier->processStatusCourier();
  endif;
  
  /* == Proccess Update Container Status == */
  if (isset($_POST['processStatusContainer'])):
      $courier->processStatusContainer();
  endif;
  
   /* == Proccess Update Consolidate Status == */
  if (isset($_POST['processStatusConsolidates'])):
      $courier->processStatusConsolidates();
  endif;
  
   /* == Proccess Deliver shipment == */
  if (isset($_POST['processDelivershipment'])):
      $courier->processDelivershipment();
  endif;
  
   /* == Proccess Picked up shipment == */
  if (isset($_POST['processPickedUpdate'])):
      $courier->processPickedUpdate();
  endif;
  
   /* == Proccess Deliver shipment == */
  if (isset($_POST['processDelivershipmentconsolidate'])):
      $courier->processDelivershipmentconsolidate();
  endif;

  /* Proccess Newsletter */
  if (isset($_POST['processNewsletter'])):
      $core->processNewsletter();
  endif;

  /* == Proccess Email Template == */
  if (isset($_POST['processEmailTemplate'])):
      $core->processEmailTemplate();
  endif;
  
  
  /* == Proccess SMS Template == */
  if (isset($_POST['processSmsTemplate'])):
      $core->processSmsTemplate();
  endif;

  /* == Proccess News == */
  if (isset($_POST['processNews'])):
      $core->processNews();
  endif;
  
  /* == Proccess SMS Twilio == */
  if (isset($_POST['processSmstwilio'])):
      $core->processSmstwilio();
  endif;
  
  /* == Proccess SMS Nexmo == */
  if (isset($_POST['processSmsnexmo'])):
      $core->processSmsnexmo();
  endif;
  
  /* == Proccess Offices == */
  if (isset($_POST['processOffices'])):
      $core->processOffices();
  endif;
  
  /* == Proccess branch Offices == */
  if (isset($_POST['processBranchoffices'])):
      $core->processBranchoffices();
  endif;
  
  /* == Proccess Courier Company == */
  if (isset($_POST['processCouriercom'])):
      $core->processCouriercom();
  endif;
  
  /* == Proccess Packaging Type == */
  if (isset($_POST['processPack'])):
      $core->processPack();
  endif;
  
  /* == Proccess Category Item == */
  if (isset($_POST['processItem'])):
      $core->processItem();
  endif;
  
  /* == Proccess Status == */
  if (isset($_POST['processStatus'])):
      $core->processStatus();
  endif;
  
  
  /* == Proccess Payment == */
  if (isset($_POST['processPayment'])):
      $core->processPayment();
  endif;
  
  /* == Proccess Shipping Mode == */
  if (isset($_POST['processShipmode'])):
      $core->processShipmode();
  endif;
  
  /* == Proccess delivery time == */
  if (isset($_POST['processDelitime'])):
      $core->processDelitime();
  endif;
  
  /* == Proccess Incoterms == */
  if (isset($_POST['processIncoterms'])):
      $core->processIncoterms();
  endif;
  
   /* == Proccess Shipping Line == */
  if (isset($_POST['processShipline'])):
      $core->processShipline();
  endif;
  
  /* == Proccess Shipping Rates == */
  if (isset($_POST['processShiprates'])):
      $core->processShiprates();
  endif;
  
  /* == Proccess Incoterms == */
  if (isset($_POST['Traslate'])):
      $core->Traslate();
  endif;
  
  /* == Proccess User == */
  if (isset($_POST['processUser'])):
      $user->processUser();
  endif;
  
  /* == Proccess Customer == */
  if (isset($_POST['processCustomer'])):
      $user->processCustomer();
  endif;
  /* == Proccess Customer == */
  if (isset($_POST['processDriver'])):
      $user->processDriver();
  endif;

  /* == Acctivate User == */
  if (isset($_POST['activateAccount'])):
      $user->activateAccount();
  endif;
  
  /* == Acctivate SMS Twilio == */
  if (isset($_POST['activateTwilio'])):
      $core->activateTwilio();
  endif;
  
  /* == Acctivate SMS Nexmo == */
  if (isset($_POST['activateNexmo'])):
      $core->activateNexmo();
  endif;
  
  /* == Acctivate SMS TEMPLATE == */
  if (isset($_POST['activateSMS'])):
      $core->activateSMS();
  endif;


  /* == Delete News == */
  if (isset($_POST['deleteNews'])):
      $id = intval($_POST['deleteNews']);
      $db->delete(Core::nTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('News <strong>News</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Officce == */
  if (isset($_POST['deleteOffice'])):
      $id = intval($_POST['deleteOffice']);
      $db->delete(Core::oTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Office</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Branch Officce == */
  if (isset($_POST['deleteBranchoffice'])):
      $id = intval($_POST['deleteBranchoffice']);
      $db->delete(Core::branchTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Branch Office</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Courier Company == */
  if (isset($_POST['deleteCouriercom'])):
      $id = intval($_POST['deleteCouriercom']);
      $db->delete(Core::ccTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Courier Company</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Packaging == */
  if (isset($_POST['deletePack'])):
      $id = intval($_POST['deletePack']);
      $db->delete(Core::ptTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Courier Packaging Type</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Category Item == */
  if (isset($_POST['deleteItem'])):
      $id = intval($_POST['deleteItem']);
      $db->delete(Core::ciTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Category Item Type</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Status == */
  if (isset($_POST['deleteStatus'])):
      $id = intval($_POST['deleteStatus']);
      $db->delete(Core::yTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Status</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  
   /* == Delete Payment == */
  if (isset($_POST['deletePayment'])):
      $id = intval($_POST['deletePayment']);
      $db->delete(Core::pmTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Method Payment</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Shipping mode == */
  if (isset($_POST['deleteShipmode'])):
      $id = intval($_POST['deleteShipmode']);
      $db->delete(Core::smTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Shipping Mode</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete delivery time == */
  if (isset($_POST['deleteDelitime'])):
      $id = intval($_POST['deleteDelitime']);
      $db->delete(Core::delitimeTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Delivery time</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Shipping line == */
  if (isset($_POST['deleteShipline'])):
      $id = intval($_POST['deleteShipline']);
      $db->delete(Core::slineTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Shipping Line</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Incoterms == */
  if (isset($_POST['deleteIncoterms'])):
      $id = intval($_POST['deleteIncoterms']);
      $db->delete(Core::incoTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Name Incoterms</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Shipping Rates == */
  if (isset($_POST['deleteShiprates'])):
      $id = intval($_POST['deleteShiprates']);
      $db->delete(Core::raTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('New <strong>Shipping Rates</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Courier == */
  if (isset($_POST['deleteCourier'])):
      $qid = intval($_POST['deleteCourier']);
      $db->delete(Core::cTable, "qid='" . $qid . "'");
       $db->delete(Core::addcourierTable, "id_add='" . $qid . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>Shipment</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
   /* == Delete Container == */
  if (isset($_POST['deleteCouriercontainer'])):
      $id = intval($_POST['deleteCouriercontainer']);
      $db->delete(Core::ctmpTable, "id='" . $id . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item container</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Consolidate == */
  if (isset($_POST['deleteConsolidate'])):
      $con_tmp = intval($_POST['deleteConsolidate']);
      $db->delete(Core::contmpTable, "con_tmp='" . $con_tmp . "'");
      $db->delete(Core::addcontaTable, "con_tmp='" . $con_tmp . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item consolidate</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Container == */
  if (isset($_POST['deleteListcontainer'])):
      $idcon = intval($_POST['deleteListcontainer']);
      $db->delete(Core::contaTable, "idcon='" . $idcon . "'");
      $db->delete(Core::cdetailTable, "idcon='" . $idcon . "'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item container</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
  endif;
  
  /* == Delete Consolidate List == */
  if (isset($_POST['deleteListconsolidate'])):
      $consol_tid = intval($_POST['deleteListconsolidate']);
      $db->delete(Core::consolTable, "consol_tid='".$consol_tid."'");
      $db->query("UPDATE add_courier SET n_trackc='0', status_courier='In warehouse', con_status='0', consol_id='0', consol_tid='0'  WHERE consol_tid='".$consol_tid."'");

      print ($db->affected()) ? Filter::msgOk('The <strong>item consolidate</strong> has been successfully deleted!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.'); 
  endif;

  
  
  /* == Delete User == */
  if (isset($_POST['deleteUser'])):
      $id = intval($_POST['deleteUser']);
      if ($id == 1):
          Filter::msgError("<span>Error!</span>You cannot delete main Super Admin account!");
      else:
          $db->delete("users", "id='" . $id . "'");
          $username = sanitize($_POST['title']);
          print ($db->affected()) ? Filter::msgOk('User <strong>' . $username . '</strong> deleted successfully!') : Filter::msgAlert('<span>Alert!</span>Nothing to process.');
      endif;
  endif;
  
 ?>