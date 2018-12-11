<ul>
{foreach from=$last key=k item=news_item}	         
    <li><a>{$news_item['name']}</a>
		{if ($news_item['text'])}
			<div>{$news_item['text']}</div>
		{/if}
    </li>    	
{/foreach}
</ul>  	
{literal}
<script>
	$('.solutions-block ul li').each(function(){
		var self = this;
		$(self).click(function(){
			var twidth = $('a',self).width();
			$(self).attr('class');
			if($(self).hasClass('actv')) {
				//console.log('w00');			
		    	$('div',self).animate({'margin-left': 0,opacity:0},200);
		    	$('div',self).css('display','none');
		    	$('.solutions-block ul li div').animate({'margin-left': 0,opacity:0},200);
		    	$('.solutions-block ul li div').css('display','none');
		    	$(self).removeClass('actv');
		    	$('.solutions-block ul li').removeClass('actv');
		    } else {
		    //	console.log(self);
		    	$('.solutions-block ul li div').animate({'margin-left': 0,opacity:0},200);
		    	$('.solutions-block ul li div').css('display','none');
		    	$('.solutions-block ul li').removeClass('actv');
		    	$('div',self).delay(100).css('display','block').animate({'margin-left': twidth + 50,opacity:1}, 200);
				$(self).addClass('actv');
		    }
		});
	});
</script>
{/literal}	