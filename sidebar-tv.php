<div class="col-auto px-0 col-md-7 col-xl-3 position-fixed" style="background-color: var(--color-secondary);">
    <div class="text-white d-flex flex-column vh-100">
      <?php if (! function_exists('dynamic_sidebar') || ! dynamic_sidebar('Colonne Droite')) :
          the_widget('WidgetInformation');
          the_widget('WidgetWeather');
      endif; ?>
    </div>
</div>
