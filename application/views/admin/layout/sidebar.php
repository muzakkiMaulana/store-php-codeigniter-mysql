<div class="row d-flex">
    <nav class="col-md-3 collapse show" id="sidebar">
      <h2>I'm a sidebar</h2>      
    </nav>
    <main class="col-md-9">
      <i class="fa fa-times" data-toggle="collapse" data-target="#sidebar" aria-hidden="true" aria-expanded="false" aria-controls="sidebar" onclick="var that = this; setTimeout(function() {console.log(that.parentNode);that.parentNode.style.flex = 'auto';that.parentNode.style['max-width'] = 'none';}, 2000);"></i>
      <h2>I'm the main content</h2>
    </main>
  </div>