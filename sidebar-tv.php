<div class="col-auto col-md-5 col-xl-3 px-0" style="background-color: var(--color-secondary);">
    <div class="d-flex flex-column pt-2 text-white vh-100">
      <?php if (! function_exists('dynamic_sidebar') || ! dynamic_sidebar('Colonne Droite')) :
          the_widget('WidgetInformation');
          the_widget('WidgetWeather');
      endif; ?>
    </div>
</div>
