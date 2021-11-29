<?php if(!empty($msg)):?>
    <?php foreach($msg as $messages):?>
      <?php if($messages['date']!=$date):?>
      <div class="message-container">
      <div class="pic-container">
        <!-- <img src="https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg" alt="" class="profilePic" /> -->
        <?php if($messages['count']!=101):?>
          <div class="status status-danger"></div>
          <?php endif;?>
          <?php if($messages['count']==101):?>
          <div class="status status-success"></div>
          <?php endif;?>
        
      </div>
      <h3 class="name"style="color:purple"><?php echo date(' F jS, Y', strtotime($messages['date']));?></h3>
      <div class="message">
        <p><?php if($messages['count']==101):?>
          <span style="color:green">Completed...</span>
          <?php endif;?>
          <?php if($messages['count']!=101):?>
          <span style="color:red">Missed <?php echo 101-$messages['count']; ?> Times</span>
          <?php endif;?>
      </p>
      </div>
      <div class="time"><span><?php echo $messages['time']?></span></div>
    </div>
    <?php endif;?>

    <!-- today date -->
    <?php if($messages['date']==$date):?>
      <?php if($messages['count']<101):?>
      <div class="message-container">
      <div class="pic-container">
        <!-- <img src="https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg" alt="" class="profilePic" /> -->
        <div class="status status-warning"></div>
      </div>
      <h3 class="name" style="color:purple">Today</h3>
      <div class="message">
        <p>Please Complete today Task... Remaining <span style="color:orange"><?php echo 101-$messages['count']; ?> Times</span></p>
      </div>
      <!-- <div class="time"><span>07:54 AM</span></div> -->
    </div>
      

      <?php endif;?>
      <?php if($messages['count']==101):?>
      <div class="message-container">
      <div class="pic-container">
        <!-- <img src="https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg" alt="" class="profilePic" /> -->
        <div class="status status-success"></div>
      </div>
      <h3 class="name" style="color:purple">Today</h3>
      <div class="message">
        <p><span style="color:green">Completed...</span></p>
      </div>
      <!-- <div class="time"><span>07:54 AM</span></div> -->
    </div>
    

      <?php endif;?>
      <?php endif;?>

      <!-- today date -->
    <?php endforeach;?>
    <?php endif;?>