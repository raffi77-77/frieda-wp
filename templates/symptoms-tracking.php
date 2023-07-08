<?php
/*
Template Name: Symptoms Tracking
*/
redirectUnLoggedUser();
get_header();
?>
<div class="tracking-section">
  <div class="container">
    <h3>Mein Tracker</h3>
    <p class="paragraph"  style="text-align: left;">Bitte beachte, dass der Tracker ein optionales Tool ist und kein obligatorischer Bestandteil des Programms. Es kann jedoch eine hilfreiche Möglichkeit sein, um Deine Begleiterscheinungen zu überwachen, Auslöser zu identifizieren und Deinen Fortschritt im Laufe der Zeit zu verfolgen. Um den Tracker zu verwenden, gib einfach Deine Begleiterscheinung ein, einschließlich der Situation, in der sie aufgetreten ist, der Intensität und wie sehr sie Dich belastet hat. Notiere auch Deine Emotionen, körperlichen Empfindungen, Gedanken und Reaktionen auf jede Begleiterscheinung. Du kannst immer nur eine Begleiterscheinung zur gleichen Zeit aufzeichnen, aber mehrere Begleiterscheinungen in Dein Tracker eintragen. Überprüfe Deinen Tracker regelmäßig, um zu sehen, wie sich Deine Begleiterscheinungen im Laufe der Zeit verändert haben und um Muster oder Auslöser zu identifizieren. Verwende den Tracker täglich für die besten Ergebnisse.</p>
    <div class="tracking-wrap">
      <a class="tracking-block" href="<?= SUBMIT_SYMPTOMS_TRACKER_PAGE_LINK;?>">
        <span class="icon">
          <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/tc.svg" />
        </span>
        <span class="content">+Begleiterscheinung hinzufügen</span>
      </a>
    </div>
    <a class="tracking-logs" href="<?= SYMPTOMS_TRACKER_PAGE_LINK ?>">
      <span class="icon">
        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/trace-logo.svg" />
      </span>
      <div class="innerconent">
        <h3>Meine Begleiterscheinungen im Verlauf</h3>
        <p>Wie sich deine Begleiterscheinungen im Zeitverlauf entwickelt haben, kannst du die hier anschauen.</p>
      </div>
    </a>
  </div>
</div>

<?php get_footer(); ?>
