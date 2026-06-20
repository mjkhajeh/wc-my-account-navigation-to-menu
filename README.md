# WooCommerce My Account Navigation to Menu

Edit the items shown on the WooCommerce **My Account** page using a regular WordPress navigation menu — no more digging through filters and endpoint code just to rename, reorder, or hide an account tab.

## Description

By default, WooCommerce builds the My Account page navigation (Orders, Downloads, Addresses, Account details, Logout, etc.) from its own internal list, and customizing it normally means writing PHP filters.

This plugin registers a dedicated WordPress menu location called **Account page menu**. Once you assign a menu to that location, the plugin:

- Replaces the default My Account navigation items with the items from your menu (using the menu item's title and URL).
- Rewrites WooCommerce's internal endpoint URLs so they match the URLs defined in your menu.

This means you can manage the My Account navigation the same way you manage any other menu on your site — via **Appearance → Menus** — including reordering items by drag-and-drop, renaming labels, and adding or removing entries.

## Requirements

- WordPress 5.8 or later
- PHP 7.4 or later
- [WooCommerce](https://wordpress.org/plugins/woocommerce/) (active)

## Installation

1. Upload the plugin folder to `/wp-content/plugins/`, or install the plugin zip via **Plugins → Add New → Upload Plugin** in your WordPress admin.
2. Activate the plugin through the **Plugins** screen.
3. Go to **Appearance → Menus**.
4. Create a new menu (or choose an existing one) and add the items you want to appear on the My Account page.
5. Under **Menu Settings**, assign the menu to the **Account page menu** location, then save.

## Usage

Once a menu is assigned to the **Account page menu** location:

- The My Account page navigation will use the titles and URLs from that menu instead of the WooCommerce defaults.
- Reordering items in the menu reorders them on the My Account page.
- Renaming a menu item's label changes the label shown on the My Account page.
- Internal WooCommerce endpoint links elsewhere on the site (e.g. "View Orders" links) are updated to match the URLs from your menu, so navigation stays consistent.

If no menu is assigned to the **Account page menu** location, the plugin has no effect and WooCommerce's default My Account navigation is used as-is.

## Frequently Asked Questions

**Does this work without WooCommerce?**
No, WooCommerce must be installed and active, since this plugin hooks into WooCommerce's account navigation filters.

**Can I add custom links or pages?**
Yes. Any item you can normally add to a WordPress menu (pages, custom links, posts, categories) can be added to the Account page menu, as long as the corresponding endpoint exists.

**What happens to endpoints not included in my menu?**
Endpoints not present in your assigned menu are left to WooCommerce's default behavior for their URL, but only items present in the menu will be pulled into the rendered navigation list.

## Changelog

### 1.0.0.0
- Initial release.

## License

GPL v2 or later. See [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html) for the full license text.

## Author

**MohammadJafar Khajeh**
[https://mjkhajeh.ir](https://mjkhajeh.ir)
