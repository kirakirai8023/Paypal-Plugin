# Xboard PayPal 插件 / Xboard PayPal Plugin

[中文](#中文版本) | [English](#english-version)

## 中文版本

### Xboard PayPal 插件

此插件将PayPal支付功能集成到Xboard面板中。它允许管理员配置PayPal的API凭据并管理支付设置。

### 功能

- 轻松集成PayPal，接受支付。
- 通过管理界面进行配置。
- 支持PayPal沙盒和生产环境。

### 安装

1. 将 `paypal_plugin` 文件夹上传到Xboard面板的插件目录。
2. 编辑 `config.php` 文件，输入您的PayPal客户端ID和密钥。
3. 访问 `settings.php` 页面配置其他设置。

### 使用

- 使用 `paypal_handler.php` 中的 `createPayment` 函数发起PayPal支付请求。

### 许可证

此项目根据MIT许可证授权。有关详细信息，请参阅 [LICENSE](LICENSE) 文件。

**免责声明**: 该软件按“原样”提供，不提供任何形式的保证，明示或暗示，包括但不限于适销性、适合特定目的和不侵权的保证。在任何情况下，作者或版权持有人均不对因本软件或本软件的使用或其他交易产生的任何索赔、损害或其他责任负责，无论是在合同诉讼、侵权或其他情况下。

---

## English Version

### Xboard PayPal Plugin

This plugin integrates PayPal payment functionality into the Xboard panel. It allows administrators to configure PayPal API credentials and manage payment settings.

### Features

- Easy integration with PayPal for accepting payments.
- Configurable via the admin interface.
- Supports both sandbox and live PayPal environments.

### Installation

1. Upload the `paypal_plugin` folder to the plugins directory of your Xboard panel.
2. Edit the `config.php` file to include your PayPal client ID and secret.
3. Access the `settings.php` page to configure additional settings.

### Usage

- Use the `createPayment` function in `paypal_handler.php` to initiate PayPal payment requests.

### License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

**Disclaimer**: This software is provided "as is", without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. In no event shall the authors or copyright holders be liable for any claim, damages or other liability, whether in an action of contract, tort or otherwise, arising from, out of or in connection with the software or the use or other dealings in the software.

