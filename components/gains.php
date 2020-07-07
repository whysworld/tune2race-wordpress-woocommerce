<div class="bg-texture bg-texture--fixed gains">
  <div class="grid-fluid bg-grey-xxdark txt-white txt-center p-3 gains__header">
    <h1 class="h">
      <span class="hidden--sm-down"><span class="svg-bg svg-bg--tick-green mr-1"></span> Here are the <span class="txt-circle display-mid txt-xbold mx-1">4</span> ways we can </span><span class="txt-xbold"><span class="hidden--md-up">B</span><span class="hidden--sm-down">b</span>oost your
        <span id="jsCarGainsHeader">car</span>
      </span>
      <a href="/select-your-car" class="btn btn--sm btn--on-dark-alt my-1 ml-2">change</a>
    </h1>
  </div>
  <div class="grid-xsqueeze p-0 px-3--md txt-center">
    <div id="jsPowergateCta" class="px-4 bg-black mt-3 txt-white"></div>
    <!-- gain_service -->
    <div class="gain_service">
      <div class="bg-dark-overlay txt-white p-3 my-3 my-5--lg">
        <?php
          $form_prefix = 'perft';
          $service_id = $performance_tuning_id;
          $service_name = get_the_title($service_id);
          $service_link = get_permalink($service_id);
        ?>
        <h2 class="h h--2 txt-left--md"><span class="txt-circle display-b display-ib--md display-mid txt-xbold mx-auto mx-1--md mb-2 mb-0--md">1</span> <?=$service_name?></h2>
        <div id="jsGainsPerformance"><div class="loading" data-js="loading"><div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div><div class="loading__txt">Loading</div></div></div>
        <?php include('form-gains.php'); ?>
      </div>
    </div>
    <!-- gain_service -->
    <div class="gain_service">
      <div class="bg-dark-overlay txt-white p-3 my-3 my-5--lg">
        <?php
          $form_prefix = 'eco';
          $service_id = $eco_tuning_id;
          $service_name = get_the_title($service_id);
          $service_link = get_permalink($service_id);
        ?>
        <h2 class="h h--2 txt-left--md"><span class="txt-circle display-b display-ib--md display-mid txt-xbold mx-auto mx-1--md mb-2 mb-0--md">2</span> <?=$service_name?></h2>
        <div id="jsGainsEco"><div class="loading" data-js="loading"><div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div><div class="loading__txt">Loading</div></div></div>
        <?php include('form-gains.php'); ?>
      </div>
    </div>
    <!-- gain_service -->
    <div class="gain_service">
      <div class="bg-dark-overlay txt-white p-3 my-3 my-5--lg">
        <?php
          $form_prefix = 'tuned';
          $service_id = $tuned_plus_id;
          $service_name = get_the_title($service_id);
          $service_link = get_permalink($service_id);
        ?>
        <h2 class="h h--2 txt-left--md"><span class="txt-circle display-b display-ib--md display-mid txt-xbold mx-auto mx-1--md mb-2 mb-0--md">3</span> <?=$service_name?></h2>
        <?php
          include('gains-tuned-plus.php');
          include('form-gains.php');
        ?>
      </div>
    </div>
    <!-- gain_service -->
    <div class="gain_service">
      <div class="bg-dark-overlay txt-white p-3 my-3 my-5--lg">
        <?php
          $form_prefix = 'dpf';
          $service_id = $dpf_egr_id;
          $service_name = get_the_title($service_id);
          $service_link = get_permalink($service_id);
          ?>
          <h2 class="h h--2 txt-left--md"><span class="txt-circle display-b display-ib--md display-mid txt-xbold mx-auto mx-1--md mb-2 mb-0--md">4</span> <?=$service_name?></h2>
        <?php
          include('gains-dpf-egr.php');
          include('form-gains.php');
        ?>
      </div>
    </div>
  </div>
</div>