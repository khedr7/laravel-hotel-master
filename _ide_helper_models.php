<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\Message
     *
     * @property int $id
     * @property string $title
     * @property string $email
     * @property string $content
     * @property string $type
     * @property int|null $user_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Message query()
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereContent($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Message whereUserId($value)
     */
    class Message extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Offer
     *
     * @property int $id
     * @property array $name
     * @property int $discount
     * @property string $type
     * @property string $started_at
     * @property string $ended_at
     * @property string|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read array $translations
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
     * @property-read int|null $reservations_count
     * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDiscount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereEndedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereStartedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
     */
    class Offer extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Reservation
     *
     * @property int $id
     * @property float $price
     * @property int|null $user_id
     * @property int $room_id
     * @property int|null $offer_id
     * @property float $paid
     * @property string $started_at
     * @property string $ended_at
     * @property string|null $paid_at
     * @property string|null $canceled_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Offer|null $offer
     * @property-read \App\Models\Room $room
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
     * @property-read int|null $transactions_count
     * @property-read \App\Models\User|null $user
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCanceledAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereEndedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereOfferId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePaid($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePaidAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereRoomId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereStartedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
     */
    class Reservation extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Review
     *
     * @property int $id
     * @property string $name
     * @property string $job_title
     * @property int $customer_id
     * @property int $rate
     * @property string $message
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\User $user
     * @method static \Database\Factories\ReviewFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Review query()
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereCustomerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereJobTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereMessage($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereRate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
     */
    class Review extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Room
     *
     * @property int $id
     * @property int $number
     * @property int $beds
     * @property float $price
     * @property string $story
     * @property array $status
     * @property array $description
     * @property int $room_type_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read array $translations
     * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
     * @property-read int|null $media_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
     * @property-read int|null $reservations_count
     * @property-read \App\Models\RoomType $roomType
     * @method static \Database\Factories\RoomFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Room query()
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereBeds($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereRoomTypeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereStatus($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereStory($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Room whereUpdatedAt($value)
     */
    class Room extends \Eloquent implements \Spatie\MediaLibrary\HasMedia
    {
    }
}

namespace App\Models {
    /**
     * App\Models\RoomService
     *
     * @property int $id
     * @property string $name
     * @property string $description
     * @property float $price
     * @property string $status
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
     * @property-read int|null $media_count
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService query()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService whereStatus($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomService whereUpdatedAt($value)
     */
    class RoomService extends \Eloquent implements \Spatie\MediaLibrary\HasMedia
    {
    }
}

namespace App\Models {
    /**
     * App\Models\RoomServiceRequest
     *
     * @property int $id
     * @property int $room_service_id
     * @property int $room_id
     * @property int $reservation_id
     * @property int $employee_id
     * @property string $notes
     * @property string|null $done_at
     * @property string|null $canceled_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\User $employee
     * @property-read \App\Models\Reservation $reservation
     * @property-read \App\Models\Room $room
     * @property-read \App\Models\RoomService $roomService
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest newQuery()
     * @method static \Illuminate\Database\Query\Builder|RoomServiceRequest onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest query()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereCanceledAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereDoneAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereEmployeeId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereNotes($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereReservationId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereRoomId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereRoomServiceId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomServiceRequest whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|RoomServiceRequest withTrashed()
     * @method static \Illuminate\Database\Query\Builder|RoomServiceRequest withoutTrashed()
     */
    class RoomServiceRequest extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\RoomType
     *
     * @property int $id
     * @property array $name
     * @property float $price
     * @property array $description
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property-read array $translations
     * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
     * @property-read int|null $media_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Room[] $rooms
     * @property-read int|null $rooms_count
     * @method static \Database\Factories\RoomTypeFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType newQuery()
     * @method static \Illuminate\Database\Query\Builder|RoomType onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType query()
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|RoomType withTrashed()
     * @method static \Illuminate\Database\Query\Builder|RoomType withoutTrashed()
     */
    class RoomType extends \Eloquent implements \Spatie\MediaLibrary\HasMedia
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Setting
     *
     * @property int $id
     * @property string $key
     * @property string $value
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
     * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
     */
    class Setting extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Transaction
     *
     * @property int $id
     * @property string $billable_type
     * @property int $billable_id
     * @property string $type
     * @property int $amount
     * @property string $description
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $billable
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBillableId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBillableType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
     */
    class Transaction extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string|null $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string $country
     * @property string $job_title
     * @property string $national_id
     * @property string $phone
     * @property int $salary
     * @property string|null $national_id
     * @property string|null $country
     * @property string|null $phone_number
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string|null $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
     * @property-read int|null $media_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
     * @property-read int|null $messages_count
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
     * @property-read int|null $permissions_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
     * @property-read int|null $reservations_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
     * @property-read int|null $reviews_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
     * @property-read int|null $roles_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
     * @property-read int|null $tokens_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
     * @property-read int|null $transactions_count
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereJobTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereNationalId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereSalary($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     */
    class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia
    {
    }
}
