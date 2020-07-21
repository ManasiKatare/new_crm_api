<?php

namespace Modules\Core\Models\Organization\Traits\Relationship;

use Modules\Core\Models\Common\Configuration;

/**
 * Class Organization Relationship
 */
trait OrganizationRelationship
{
	/**
	 * Users
	 */
	public function users()
	{
		return $this->hasMany(
			config('omnicrm-class.class_model.user'),
			'org_id', 'id'
		);
	} //Function End


	/**
	 * Configurations
	 */
	public function configurations()
	{
		return $this->belongsToMany(
			Configuration::class,
			config('omnicrm-migration.table_name.organization_configurations'),
			'org_id', 'configuration_id'
		)
		->withPivot('value');
	}
} //Trait Ends
