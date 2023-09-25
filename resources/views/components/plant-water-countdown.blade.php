<div>
    <p>Planta: {{ $plantName }}</p>
    <p>Tiempo para el próximo riego: {{ $nextWateringDate->diffForHumans() }}</p>
</div>