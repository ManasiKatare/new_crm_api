<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privileges = [
            /**
             * ORGANIZATION PRIVILEGES
             */
            [ //list_all_organizations
                'key' => 'list_all_organizations',
                'display_value' => 'Show All Organizations',
                'is_secure' => true
            ],
            [ //view_organization
                'key' => 'view_organization',
                'display_value' => 'Read/View Organization Data',
            ],
            [ //add_organization
                'key' => 'add_organization',
                'display_value' => 'Add Organization',
                'is_secure' => true
            ],
            [ //edit_organization
                'key' => 'edit_organization',
                'display_value' => 'Edit/Amend Organization Data',
            ],
            [ //delete_organization
                'key' => 'delete_organization',
                'display_value' => 'Delete Organization',
                'is_secure' => true
            ],

            /**
             * PRIVILEGE PERMISSIONS
             */
            [ //list_all_privileges
                'key' => 'list_all_privileges',
                'display_value' => 'Show All Privileges',
                'is_secure' => true
            ],


            /**
             * ROLE PRIVILEGES
             */
            [ //list_all_roles
                'key' => 'list_all_roles',
                'display_value' => 'Show All Organization Roles',
            ],
            [ //view_role
                'key' => 'view_role',
                'display_value' => 'Read/View Role',
            ],
            [ //add_role
                'key' => 'add_role',
                'display_value' => 'Add Role',
            ],
            [ //edit_role
                'key' => 'edit_role',
                'display_value' => 'Edit/Amend Role',
            ],
            [ //delete_role
                'key' => 'delete_role',
                'display_value' => 'Delete Role',
            ],


            /**
             * SUBSCRIPTION PRIVILEGES
             */
            [ //view_account
                'key' => 'manage_subscriptions',
                'display_value' => 'Manage Subscription',
                'is_secure' => true
            ],
            [ //add_subscription
                'key' => 'add_subscription',
                'display_value' => 'Add Subscription',
                'is_secure' => true
            ],
            [ //edit_subscription
                'key' => 'edit_subscription',
                'display_value' => 'Edit/Amend Subscription',
                'is_secure' => true
            ],
            [ //delete_subscription
                'key' => 'delete_subscription',
                'display_value' => 'Delete Subscription',
                'is_secure' => true
            ],
            

            /**
             * ORGANIZATION-ACCOUNT PRIVILEGES
             */
            [ //list_all_organization_accounts
                'key' => 'list_all_organization_accounts',
                'display_value' => 'Show All Accounts in the Organization',
            ],
            [ //view_account
                'key' => 'view_account',
                'display_value' => 'Read/View Account',
            ],
            [ //add_account
                'key' => 'add_account',
                'display_value' => 'Add Account',
            ],
            [ //edit_account
                'key' => 'edit_account',
                'display_value' => 'Edit/Manage Account',
            ],
            [ //delete_account
                'key' => 'delete_account',
                'display_value' => 'Delete Account',
            ],


            /**
             * ORAGANIZARION-PREFERENCES PRIVILEGES
             */
            [ //list_all_organization_preferences
                'key' => 'list_all_organization_preferences',
                'display_value' => 'Show All Preferences in the Organization',
            ],
            [ //view_preference
                'key' => 'view_preference',
                'display_value' => 'Read/View Preference',
            ],
            [ //add_preference
                'key' => 'add_preference',
                'display_value' => 'Add Preference',
            ],
            [ //edit_preference
                'key' => 'edit_preference',
                'display_value' => 'Edit/Amend Preference',
            ],
            [ //delete_preference
                'key' => 'delete_preference',
                'display_value' => 'Delete Preference Data',
            ],


            /**
             * CONTACT PRIVILEGES
             */
            [ //list_all_contacts
                'key' => 'list_all_contacts',
                'display_value' => 'Show All Contacts',
            ],
            [ //list_account_contacts_only
                'key' => 'list_account_contacts_only',
                'display_value' => 'Show All Contacts for an Account Only',
            ],
            [ //list_user_contacts_only
                'key' => 'list_user_contacts_only',
                'display_value' => 'Show All Contacts for the User/Owner Only',
            ],
            [ //view_contact
                'key' => 'view_contact',
                'display_value' => 'Show/View Contact Record',
            ],  
            [ //add_contact
                'key' => 'add_contact',
                'display_value' => 'Add Contact Record',
            ],
            [ //edit_contact
                'key' => 'edit_contact',
                'display_value' => 'Edit/Amend Contact Record',
            ],
            [ //delete_contact
                'key' => 'delete_contact',
                'display_value' => 'Delete Contact Record',
            ],
            [ //show_contact_unmasked_data
                'key' => 'show_contact_unmasked_data',
                'display_value' => 'Show Contact Record (Unmasked)',
            ],

            
            /**
             * NOTE PRIVILEGES
             */
            [ //add_note
                'key' => 'add_note',
                'display_value' => 'Add Note',
            ],
            [ //edit_note
                'key' => 'edit_note',
                'display_value' => 'Amend/Edit Note',
            ],
            [ //delete_note
                'key' => 'delete_note',
                'display_value' => 'Delete Note',
            ],

            
            /**
             * DOCUMENT PRIVILEGES
             */
            [ //add_document
                'key' => 'add_document',
                'display_value' => 'Add Document',
            ],
            [ //edit_document
                'key' => 'edit_document',
                'display_value' => 'Amend/Edit Document',
            ],
            [ //delete_document
                'key' => 'delete_document',
                'display_value' => 'Delete Document',
            ],
            [ //view_document
                'key' => 'view_document',
                'display_value' => 'View/Download Document',
            ],          

            
            /**
             * TELE-COMMUNICATION PRIVILEGES
             */
            [ //allow_call_outgoing
                'key' => 'allow_call_outgoing',
                'display_value' => 'Outgoing Call',
            ],
            [ //allow_call_incoming
                'key' => 'allow_call_incoming',
                'display_value' => 'Incoming Call',
            ],
            [ //allow_sms_outgoing
                'key' => 'allow_sms_outgoing',
                'display_value' => 'Send SMS',
            ],
            [ //allow_msg_outgoing
                'key' => 'allow_msg_outgoing',
                'display_value' => 'Send Messages',
            ],
            [ //allow_email_outgoing
                'key' => 'allow_email_outgoing',
                'display_value' => 'Send E-Mail',
            ],
        ];

        foreach ($privileges as $privilege) {
            $response = factory(\Modules\Core\Models\Privilege\Privilege::class)->create([
                'key' => $privilege['key'],
                'display_value' => $privilege['display_value'],
                'is_secure' => isset($privilege['is_secure'])?$privilege['is_secure']:false,
            ]);
        } //Loop ends
    } //Function ends
} //Class ends
