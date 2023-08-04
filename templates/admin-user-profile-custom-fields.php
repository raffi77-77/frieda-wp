<h3>Custom Fields</h3>
<p>User data custom fields.</p>
<table class="form-table" role="presentation">
    <tbody>
    <tr>
        <th><label for="is-test-user">Is test user</label></th>
        <td>
            <input name="_frieda_is_test_user" type="checkbox" id="is-test-user" value="1" <?php echo is_test_user( $user->ID ) ? 'checked="checked"' : '' ?>/>
        </td>
    </tr>
    </tbody>
</table>
