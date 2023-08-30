<?php
$selected = get_user_meta( $user->ID, '_frieda_is_test_user', true );
?>
<h3>Custom Fields</h3>
<p>User data custom fields.</p>
<table class="form-table" role="presentation">
    <tbody>
    <tr>
        <th><label for="is-test-user">Is test user</label></th>
        <td>
            <input id="test_user" <?= ($selected == 'yes') ? 'checked' : ''?> type="radio" name="_frieda_is_test_user" value="yes">
            <label for="test_user">Yes </label>
            <input id="not_test_user" <?= ($selected == 'no') ? 'checked' : ''?> type="radio" name="_frieda_is_test_user" value="no">
            <label for="not_test_user">No </label>
        </td>
    </tr>
    </tbody>
</table>
