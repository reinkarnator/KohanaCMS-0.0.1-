<div class="solp">
{$last}
</div>
{literal}
<script>
  $('div.solp ul li').hover(function(){
      $('ul',this).stop().show(200);
  });
  $('div.solp ul li').on('mouseleave',function(){
    $('ul',this).stop().hide(200);
  });
</script>
{/literal}
  		