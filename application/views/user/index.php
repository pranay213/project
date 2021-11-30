<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,700'><link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">

</head>

<!-- partial:index.partial.html -->
<body id='total-body'> 

  <header style="margin:10px">
<a href='#scrollhere' id='abc'>hi</a>
    <a  class="btn btn-icon"><i class="back"></i> </a>
    <span style="color:green;padding:0px 15px"><?php echo date('l', strtotime(date("Y-m-d")));?></span>
    <span style="float:right;color:orange"><?php echo date(' F jS, Y', strtotime(date("Y-m-d")));?></span>
    <br>
    <br>
    <span style="float:right;color:grey">Time: <i id="time"></i> </span>
   
   
    <span class="header-label"></span>
  </header>
  <div id="content">
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
    <div id='scrollhere'>this div scroll</div>
      </div>
    <footer>
    <div class="editor" style="border:2px solid grey;border-radius:10px">
      <input type="text" id="text_value"  placeholder="Type Here...." />
      <a  class="btn btn-icon btn-big right"><i class="send"></i></a>
    </div>
    <!-- <div class="tab-container">
      <div class="tab">
        <a  class="btn btn-icon btn-big active"><i class="chat"></i></a>
      </div>
      <div class="tab">
        <a  class="btn btn-icon btn-big"><i class="user"></i></a>
      </div>
      <div class="tab">
        <a  class="btn btn-icon btn-big"><i class="settings"></i></a>
      </div>
    </div> -->
  </footer>

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
  </div>
  
</body>

<!-- partial -->
  

</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
   
  let upDateTime=()=>
  {
   let time=new Date().toLocaleTimeString()
  document.getElementById('time').innerHTML=time;

  }
  setInterval(upDateTime,1000);

 $(document).ready(function()
 {
   $('#abc').trigger('click');
   
   let height=document.getElementById('content').scrollHeight;
   console.log(height)
  window.scrollTo(0, 1);
   $('#text_value').on('keyup',function(e)
   {
     console.log('j')
     e.preventDefault()
     let key_val=$('#text_value').val(); 
    if(key_val=='srirama')
    {
      update_db()
      clear_text();
    }
   })
 })
 let update_db=()=>
 {
    
    let key_text=$('#text_value').val()
       $.ajax(
      {
        url:"<?php echo base_url('update-db')?>",
        data:{text:key_text},
        type:'post',
        success:function(data)
        {
          console.log(data)
          if(data=='cls')          {
            load_total();
          }
          else if(data=='completed')
          {
            load_total();
            $('footer').html('')
          }
        }
      }
    )
 }
 let clear_text=()=>
 {
  $('#text_value').val('')
 }
 function load_total()
 {
   $.ajax(
     {
       url:'<?php echo base_url('update-content')?>',
       type:'post',
       success:function(data)
       {
        $('#content').html(data) 
       }
     }
   )

  
    
  
 }
</script>
