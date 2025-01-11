<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Carbon; // Librearía para manejar fechas

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // Definimos los estados de la reserva
    protected $model = Reservation::class;

    public function definition(): array
    {
        /* C14 Pluck */
        $userIds = User::where('rol_id', 3)->pluck('id')->toArray(); // Obtenemos los ids de los usuarios que son "usuarios"
        $consultantIds = User::where('rol_id', 2)->pluck('id')->toArray(); // Obtenemos los ids de los usuarios que son "consultores"

        $reservationDate = $this->faker->dateTimeBetween('now', '+30 days')->format('y-m-d');
        $starTime = $this->faker->numberBetween(9, 15);
        $endTime = $starTime + 1;

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'consultant_id' => $this->faker->randomElement($consultantIds),
            'reservation_date' => $reservationDate,
            'start_time' => sprintf('%02d:00', $starTime), /* C15 sprintf */
            'end_time' => sprintf('%02d:00', $endTime),
            'reservation_status' => $this->faker->randomElement(['pendiente', 'confirmada', 'cancelada']),
            'total_amount' => 50,
            'payment_status' => $this->faker->randomElement(['pendiente', 'pagado', 'fallido']),
        ];
    }
}
