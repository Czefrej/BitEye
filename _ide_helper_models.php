<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\APICredential
 *
 * @property string $client-id
 * @property string|null $secret
 * @property string|null $last_used
 * @method static \Illuminate\Database\Eloquent\Builder|APICredential newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|APICredential newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|APICredential query()
 * @method static \Illuminate\Database\Eloquent\Builder|APICredential whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|APICredential whereLastUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|APICredential whereSecret($value)
 */
	class APICredential extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent-id
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $child
 * @property-read int|null $child_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Offer[] $offers
 * @property-read int|null $offers_count
 * @property-read Category|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $seller_id
 * @property string|null $creation_date
 * @property string|null $img_url
 * @property string|null $ean
 * @property string|null $type
 * @property string|null $ending_date
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OfferChange[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Models\Seller|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereEan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereEndingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereType($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OfferChange
 *
 * @property int $id
 * @property int|null $offer_id
 * @property string|null $name
 * @property int|null $stock
 * @property int|null $transactions
 * @property int|null $promoted
 * @property int|null $promo_bold
 * @property int|null $promo_highlight
 * @property int|null $promo_emphasized
 * @property int|null $free_delivery
 * @property float|null $lowest_delivery_price
 * @property string|null $creation_date
 * @property float|null $price
 * @property-read \App\Models\Offer|null $offer
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereFreeDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereLowestDeliveryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange wherePromoBold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange wherePromoEmphasized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange wherePromoHighlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange wherePromoted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferChange whereTransactions($value)
 */
	class OfferChange extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seller
 *
 * @property int $id
 * @property string|null $creation_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SellerChange[] $changes
 * @property-read int|null $changes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Offer[] $offers
 * @property-read int|null $offers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereId($value)
 */
	class Seller extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SellerChange
 *
 * @property int $id
 * @property int|null $seller_id
 * @property int|null $company
 * @property int|null $super_seller
 * @property string|null $login
 * @property string|null $creation_date
 * @property-read \App\Models\Seller|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange query()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerChange whereSuperSeller($value)
 */
	class SellerChange extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

