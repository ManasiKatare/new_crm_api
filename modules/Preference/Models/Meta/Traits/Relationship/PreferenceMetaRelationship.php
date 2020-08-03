<?php

namespace Modules\Preference\Models\Meta\Traits\Relationship;

/**
 * Class Preference Relationship
 */
trait PreferenceMetaRelationship
{
	public function type()
	{
		return $this->hasOne(
			config('crmomni-class.class_model.lookup_value'),
			'key', 'type_key'
		);
	}
}
