# # RoleUpdateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**roles** | **string[]** | &lt;p&gt;The role(s) for the user&lt;/p&gt; &lt;p&gt;The role must exist&lt;/p&gt; &lt;p&gt;The role can be a custom role or a system role but the invoker must have the permissions to assign the role&lt;/p&gt; &lt;p&gt;System roles are: backoffice.admin, payor.master_admin, payor.admin, payor.support&lt;/p&gt; | 
**verification_code** | **string** | &lt;p&gt;Optional property that MUST be suppied when manually verifying a user&lt;/p&gt; &lt;p&gt;The user&#39;s smsNumber is registered via a separate endpoint and an OTP sent to them&lt;/p&gt; | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


