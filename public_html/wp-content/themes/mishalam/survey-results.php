<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 
$cat = get_the_category()[0];
$color = get_tax_meta($cat->term_id,'color_field_id');
$image = get_tax_meta($cat->term_id,'image_field_id');
$image = $image['src'];

//===RESULTS===//
$answers=GetAnswers();
$votes=array();
$totalVoters=0;
if($answers){
    $arrVotes=array();
    $arrAnswers= array();
    foreach($answers as $answer){
        $arrAnswers[$answer->meta_id]=$answer->meta_value;
        $arrVotes[$answer->meta_id] = UsersVotedToAnswer($answer->meta_id);
        $totalVoters+=count($arrVotes[$answer->meta_id]);
    }
}
$mostPopVotersNum=0;

foreach ($arrVotes as $metaId => $arrUsers) {
    if(count($arrUsers)>$mostPopVotersNum){
        $mostPopVotersNum=count($arrUsers);
        $mostPopId=$metaId;
    }   
}
$percentage=round((count($arrVotes[$mostPopId])/$totalVoters)*100);
$mostPopAns = $arrAnswers[$mostPopId];
//finding most popular answer:
echo '<br/>voters:<br/>';
var_dump($totalVoters);
//Get users meta;
$arrUsersData=array();
foreach ($arrVotes as $usersOfAnswer) {
    foreach ($usersOfAnswer as $userId) {
        $arrUserDataRaw = get_user_meta($userId);
        $arrUserData['age']=$arrUserDataRaw['age'][0];
        $arrUserData['gender']=$arrUserDataRaw['gender'][0];
        $arrUsersData[$userId]=$arrUserData;
    }
}

//THIS WAS COPIED FROM CONTENT.PHP?>
<div class="innerpage4">
	<div class="content-index-inner3">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="component clear">
            	<div class="rightboxinnerresult">
                    <div class="cyonbox" style="background-color:<?php echo $color;?>;">
                        <div class="innerbox">
                            <div class="iconarea"><a href="#"><img src="<?php bloginfo( 'template_url' ); ?>/images/question-result.png" alt=""/></a></div>
                            <div class="head">שאלת הסקר</div>
                            <div class="txt3"><?php echo get_post_custom_values('wpcf-question')[0]; ?></div>
                        </div>
                    </div>
                    <div class="smallbanner-result">
                        <div class="innerbox"><?php the_post_thumbnail(); ?></div>
                    </div>
                    <div class="profileareagreen" style="background-color:<?php echo $color;?>;">
                        <div class="head">המובילים<br />
    בסקרים</div>
                        <div class="profilesticgreen">
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                            <div class="profilepic"><img src="<?php bloginfo( 'template_url' ); ?>/images/profile.jpg"></div>
                        </div>
                    </div>
                </div>
                <div class="leftboxinnerresult">
                <div class="facebook">
                	<div class="innerbox"><img src="<?php bloginfo( 'template_url' ); ?>/images/facewithbook.png" alt=""/></div>
                </div>
                <div class="afterfacebook">
                	<div class="innerbox">
                    	<div class="head"><?php echo $totalVoters;?></div>
                        <div class="txt">השתתפו בסקר</div>
                    </div>
                </div>
                <div class="grayarea">
                	<div class="innerbox">
                    	<div class="head"><?php echo $percentage;?>%</div>
                        <div class="txt">ל<?php echo $mostPopAns;?></div>
                    </div>
                </div>
                <div class="colerbuletarea">
                	<ul></ul>
                </div>                
                <div class="graparea">
                	<script>
					 $(document).ready(function() {
						$(".css-tabs li").live("click", function(event){
						var this_id = $(this).attr('name');
					
						$('.css-tabs li').removeClass("active");
						$('*[id^=tab]').css('display', 'none');
						
						$(this).addClass("active");
						$(this_id).css('display', 'block');
						});
					 });
					</script>
                    <ul class="css-tabs">
                      <li name="#tab2"><a id="t1" data-chartType="line"></a></li>
                      <li name="#tab1" class="active"><a id="t2" data-chartType="pie"></a></li>
                    </ul>
                	<!--<img src="<?php bloginfo( 'template_url' ); ?>/images/graph.jpg" alt=""/>-->
                    <!--<img src="<?php bloginfo( 'template_url' ); ?>/images/graph2.jpg" alt=""/>-->
                    <div class="graph"><canvas id="canvas" height="279" width="477"></canvas></div>
                    <div class="backroundimgarea">
                    	<div class="dropdown_small">
                        	<span class="">השכלה</span>
                        	<div class="droparea_small">
                            	<ul>
                                	<li><a href="#">מין</a></li>
                                    <li><a href="#">גיל</a></li>
                                    <li><a href="#">מצב משפחתי</a></li>
                                    <li><a href="#">השכלה</a></li>
                                    <li><a href="#">אזור מגורים</a></li>
                                    <li><a href="#">יליד ישראל</a></li>
                                    <li><a href="#">דת</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <select id="user-keys">
                    <option value="">none</option>
                </select>
                <select id="user-values"></select>
                </div>
                <div class="imgheaderresult">
                	<div class="head">אולי יעניין אותך גם:</div>
               
                <div class="imageresult">
                	<div class="imageboxouter">
                    	<div class="inbox">
                        
                        
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/smallimg5.jpg" />
                        <div class="entry-content imginfobox">
                            <div class="iconarea"><img src="<?php bloginfo( 'template_url' ); ?>/images/txticon.png" /></div>
                            <div class="text1">קורקינט חשמל<br>
                    				או אופניים חשמליים
                                        </div>
                        </div>
                    </div>
					</div>
                    <div class="imageboxouter">
                    <div class="inbox">
                        
                        
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/smallimg6.jpg">
                        <div class="entry-content imginfobox">
                            <div class="iconarea"><img src="<?php bloginfo( 'template_url' ); ?>/images/txticon.png"></div>
                            
                    <div class="text1">מה עדיף!<br>
אנדרואיד או אייפון?
                    </div>
                        </div><!-- .entry-content -->
                    </div><!-- #post -->
                    </div>
                    <div class="imageboxouter">
                    <div class="inbox">
                        
                        
                            <img src="<?php bloginfo( 'template_url' ); ?>/images/smallimg7.jpg">
                        <div class="entry-content imginfobox">
                            <div class="iconarea"><img src="<?php bloginfo( 'template_url' ); ?>/images/txticon.png"></div>
                            <div class="text1">מה הכי חשוב<br>
לך לדעת לפני קניית דירה</div>
                        </div><!-- .entry-content -->
                    </div><!-- #post -->
                    </div>              	
                </div> 
                </div>
                </div>
            </div>
        </article><!-- #post -->
	</div>
</div>

<script src="http://office.sola.co.il:8080/wp-content/themes/mishalam/Chart.js"></script>
<script type="text/javascript">
var chartType="pie";
var colors=['#e74b3b','#507cbe','#2CCC6F','#FFFF00','#0000FF','#00FF00','#FF0000','#000000'];

//FROM PHP:
var answers=<?php echo json_encode($arrAnswers); ?>;
var votes=<?php echo json_encode($arrVotes); ?>;
var usersData=<?php echo json_encode($arrUsersData); ?>;
//FROM PHP---END

var answersColors = assignColors();
var usersMetaKnV = {};

function buildSelectKey(){
    for(var u in usersData){
        for (var k in usersData[u]){
            if(!usersMetaKnV[k]){ 
                usersMetaKnV[k]=[]; 
            }
            if(usersMetaKnV[k].indexOf(usersData[u][k]) > -1){}//do nothing
            else if(usersData[u][k]){
                usersMetaKnV[k].push(usersData[u][k]);      
            }               
        }       
    }
    for(var k in usersMetaKnV){
        $('#user-keys').append('<option value="'+k+'">'+k+'</option>');
    }
}
function assignColors(){
    var i=0;
    var ansCol = {};
    for(var a in answers){
        ansCol[a]=colors[i];
        i++;
    }
    return ansCol;
}
function buildChart(type,mKey,mVal){
    var totalNum = 0;
    var votesCount={};    
    if(mVal){
        for(var a in votes){ //a=answer
            votesCount[a]=0;
            for(var u in votes[a]){
                console.log(votes[a][u]);
                if(usersData[votes[a][u]][mKey]==mVal){
                    votesCount[a]++;
                    totalNum++;
                }
            }
        }
    }else{
        for(var a in votes){
            votesCount[a]=votes[a].length;
            totalNum += votes[a].length;
        }   
    }
    var data=[];
    for(var a in votesCount){
        if(votesCount[a]){
            var obj = {
                value: votesCount[a]/totalNum,
                color: answersColors[a]
            };
            data.push(obj);
        }
    }

    if(type=='pie'){
            var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Pie(data,{animation:false});     
    }else{ //Ploting the bar chart
       plotBarChart(data);
    }        
}
function plotBarChart(data){
    
    /*var c=document.getElementById("canvas");
    var ctx=c.getContext("2d");
    ctx.fillStyle="#FF0000";
    ctx.fillRect(10,10,150,75);*/

    function Shape(x, y, w, h, fill) {
    this.x = x;
    this.y = y;
    this.w = w;
    this.h = h;
    this.fill = fill;
    }
    function Text(x, y , text) {
    this.x = x;
    this.y = y;
    this.text = text;
    }

// get canvas element.
    var elem = document.getElementById('canvas');
    //context.clearRect ( x , y , w , h );

    // check if context exist
    if (elem.getContext) {

        var myRect = [];
        var myText = [];

        //Create the drawing object:
        $.each(data,function(i,o){
            if(o.value){
                console.log(o.value*450);
                var textXval=450-(109+i*55);
                if(o.value==1){//case 100%
                    textXval-=4;
                }

                myRect.push(new Shape(450-(115+i*55), 285-Math.round(o.value*279), 45, Math.round(o.value*279), o.color));        
                myText.push(new Text(textXval, 272, Math.round(o.value*100)));        
            }
        });
        
        context = elem.getContext('2d');
        context.clearRect(0, 0, elem.width, elem.height);

        for (var i in myRect) {
            oRec = myRect[i];
            context.fillStyle = oRec.fill;
            context.fillRect(oRec.x, oRec.y, oRec.w, oRec.h);
        }
        
        for (var i in myText) {
            oText = myText[i];
            context.textAlign = "left";
            context.textBaseLine = "bottom";
            context.font="bold 16px Arial";
            context.fillStyle = '#fff';
            context.fillText(oText.text+'%',oText.x, oText.y);
        }

    }
}
    
$(function(){
    //colors:
    $.each(answers,function(i,a){
        var color='<li><div class="violet" style="background-color:'+answersColors[i]+'"></div><div class="txtof">'+a+'</div></li>';
        $('.colerbuletarea ul').append(color);
    });
    
    //Select
    buildSelectKey();
    buildChart('pie');
    $('#user-keys').on('change',function(){
        var key = $(this).val();
        console.log(usersMetaKnV);
        $('#user-values').html('');
        $('#user-values').append('<option value="">none</option>');
        $.each(usersMetaKnV[key],function(i,v){
            $('#user-values').append('<option value="'+v+'">'+v+'</option>');
            $('#user-values').attr('data-key',key);
        });
    });
    $('#user-values').on('change',function(){
        buildChart(chartType,$(this).attr('data-key'),$(this).val());
    });
    $('#t1,#t2').click(function(){
        if(chartType!=$(this).attr('data-chartType')){
            chartType=$(this).attr('data-chartType');
            buildChart(chartType,$('#user-keys').val(),$('#user-values').val());
        }
    });
});

$(function(){
    console.log(answers);
    console.log(votes);
    console.log(usersData);
});
</script>
<style type="text/css">
/*canvas{border:solid 1px green;}*/
</style>