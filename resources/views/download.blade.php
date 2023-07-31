@extends('layouts.app')
@section('main-container')
    <section class="user bg-default">
        <div class="container py-5">
            <div class="card" id="downloadPage">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Download The Game</div>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-3">
                        <a class="w-100 text-decoration-none" href="{{ $driveLink->value }}" target="_blank">
                            <div class="card w-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span>Google Drive</span>
                                    <p class="m-0 text-muted">Faster</p>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <div class="drive-logo"></div>
                                </div>
                            </div>
                        </a>
                        <a class="w-100 text-decoration-none" href="{{ $megaLink->value }}" target="_blank">
                            <div class="card w-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span>Mega.nz</span>
                                    <p class="m-0 text-muted">Encrypted</p>
                                </div>
                                <div class="card-body">
                                    <div class="mega-logo"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .drive-logo {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAL8AAAAcCAMAAAAHvJ50AAAB0VBMVEUAAAD////////////////////////////////////////////////////////w0UpNjfVYmvwVrW4VfDwRfDURa1L3zypKkvUmrXMiqGkdn2AiklP+nS3/4lTv1Vb/zk9GeeX9zksoq2r91E4bklsdn1Qno2MQiE7/xj7wwy8WTOn+ykYMczf9uUL7lipMjubssBo+gvYVoVz+0lAPs00uqnA2iv9Yjv8Snk3/1Cc7hv/+vkM/fuD+zFYrsV7+1Uf/wS4xZeAPiUb+0EgvlIansYEGfSckoV0jn1wso2b5sSL71UHdqEQXQdJIbrkhTuQLfi4ebUj93jIij2cPL80FUx//////0U1Eh/T/0EogpGQaomH/z0cdo2IYoV9GiPT/0VFBhfT/zkVHivZIifVGiO9Be+UWn1wzgP9IiPNCfef/10//1jJCgOsksm8YqmYmp2UNq0VJjPlGhfEfrWsBkWf/21b/207/3kxPl/1FiPZEhPFFYeQ/duM9dt0fp2oXn2H/1VRDaeZAeuEjp2n/0lcTplX/0kg/Y80DnG0RoWcelGVaplsTnFL/2zo9kf8yf7k2b7Ixd58pe48jiHw2m190qlahtVTBwVLYyE312TbCw0DzAAAAVnRSTlMAd7tEEe7MIpndiGYzVar+7yD+QBEFA/7+79FKEv376tnX0s25qY+OjoN3amVHNhII8vDw7+rm5eHg3L+5uLatpZqWk4OBfnVtY1xQTko7MjAuKygbGsjlp/QAAAT+SURBVFjD1ZYHd9MwEMcly7biEbP33nvvvfde2QklQAIE0lLK3nvvzadFp1PkxjW8Etr34P9e60iW7n46nc4i3TRt/NW2+21C6ccbyP+nIc9fXWtLg7JPH88j/50m37387RpEX6htyvA+tu5R6rUwjVPP7N3IXfWO55+v1pA/e2XOr8aZHg0Ml/p/CGKkUgaJF6NSjMe8s1Ipt1f2hy571NFx+StkEKg2YWw8fSKl5Jh9xU+1yZ47JHqDXtmfXs/lOl68HFBD/sL9LXGjfEe5Apo+5UfZ0aC4jtGrnT4yMifUcfnLNeTPZmuHY6JvCx+Wy1jSdZJ9yk8pdS1YAGlN6x/lQC8uf7+G+IX0ulhP0RD5rmEYlOvDERhGopEGDN65VKgbP6fQySNWdW5SPBCc+AlDZD6cC+JTih6gmYSRFNwwojVmZD6HG/DqajoL/NlyTA11RPSbT1njOCCyb3VPAzelFfJ7qodG+QFLTHewg3qYonIkb4xPih/J0E2gQzn6bg41eMasK9l0FpSeFK2hvpiT0C2NqBfAre55zMAro+AnifyKwDFs5IjwozlfdtgWnlwkD0SHipaFbizDSIWlaWdXEfEfDR62cFwtK1Vui9ZQhm5NJiUQOaBywgWPJZpq/yk+Elg6bGhofkc8EMSJ4YegM3WgHUoZ8uOqfV1NE+ANB3OsnaOKQgK/WJ9ByMz7yF8oLBnbM/0ZLiN0xMN9tdT22DJcRgiuH76chwvnPfmZNotVE/kVOLrhskFVNntYO+/mi1Jdo4YSMnZCDfHLtZm/54d9tUI3PvwPgcL4u4ofY2YbQjD/t/x+yI+J5UiLNq7dARuNdRyqAz6oPhfau68AvtDTcfPj8sc3ZAIzhNJu0HsIFOY/0/y61Mfz42Ddofklsw+B99AuSvFPreeFisV812icNOVKuQAqX13TxM/1+WWa327mT3YDotpJEz9ViskfG39F+dUuJjHvGVBQFIPa2VXKSxXvDiGg4fPvpwtqAXt61E8zstHQVgUOKwIeMPxYQ6n3ScjPwsyIqZ8ekMXw4yvbxbfYpzVsch75SyOnNfo2yg0ol8tPm2soxXqj+THj9TkO8FZkwjmWjyD6/TXDk8mj/FzuF4/jR5uGyjkb3GgbO9qrpRKsoH3lUKK0cNWb86g3s1RXuMEQVLuR1cBD4b+hVuW4rhUuLqBCnqn4VYU3PEZdhzbxh5+RWH7cU6y5+A2hzKO2IbJnVAmVv7h1wSClBdt+DFAavzd6AUIhP3eaLl5UY6BLJcvX/PBExfHjpSqWn+k5eoK0OGSxjH/p3pPXE1cMVFq++rTSiEX7I8mqiA1q4p3FAkDXxLdJWy6GSY+G5go0vzYQsCi/DfemeH6Qg8ml3OAMmDC3q4rh/3DrdOelTOaS+Dt74ozS29kkKhO/vVo+85vfmo2AWUkmBNsQNeCTv5UwrM7v6PZqtXrv4stbd851nkIdP4u6eX3isFYdJBpXHA7VqB81ZHCpWn1y8f2Dh7cvdQp2VAZ04/q+ls0GqtqZCfjRn5raLsL/6dadysNzJzU96MT1tS0bxSqBlcripD91sF0c3mcPHlYqlZsnkR7xT444QFoXtVKoBCf9q82DL34U4a+cO3chg/Aq/Jv+yqyZpELMJP2tY0vzz25L/AuXOk9K3bhxI9M58Cj5P7T93YM7t29XBP+Fm5mbJ1CZEbPJP6+f/HjlxAjjB6kAAAAASUVORK5CYII=);
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            width: 191px;
            height: 28px;
        }
        .mega-logo {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGIAAAAZCAMAAAD9ngs+AAABC1BMVEUAAAD////////////////////////////////////////////////////bJi7bJi7////////////dJC3////////////dJS/////////////////////////////////////bJi3cJiz////aJy7////////////////////////////cJizaJy7aJy7bJi7aJi3////cJS7////cJSzbJy3////////////////bJzD////////bJy3aJi7bJSz////aJy7bJy7aIinZHiXdNj3cMTf+8PD86erYGiHxq67wo6bqgYXkXWL62dv40NHulZjsi4/odHn/9/fmaGzeP0XWERn2xcffREqflEnRAAAAQHRSTlMAC1eO5s98ZoDaYUocAuLZn0Q0Cwby1wX97OOqUiohFfXINAjoyb23hHM8MCX58LyreW9rZ1oQ7eCKSKSXk34YffQzbQAAAsVJREFUSMe1lWlX2kAUhi8JGJGENSCr7BRQQRGtuzeLWlpRS9X2//+S3hkmTALHb/E5HJhJcubJ5Z0FBLnTo+ShdZg6Os3Bl7A7SVkeqekuhM9B01phW9b4AMKm1aGB/SRbYdfQoXe36WOLH3KEW8du07KDCuqPQ81jyv5/1/UUy6Y1BT+aOjBkb+9CzYIxUAXinr7Vi3Wvh+CRUPtnYramWBHzueXYLGzHms9ZGalAGXHEtLEyUK8PkTx6NCLsLb4j50qMqzcQL4BzSgM793/wl+vYZHB/4uODQ9cuwUcMmUMacAsiUfQokeIEBXkdOH3WrgPjiCsekTm4AX9wxU1QwRzSwBRl+k5whgC1ImK3Whum4/vAqfOi+sBICgVzuGTwFM2gQjiEQVSxDx5pxF4bfGwhkrXEyzikcJmiSA5mKDKFbckwpIIcOhmkQtU4VTDPsUi+SIaRBYAzuqt1EY+BsITi9QXxGfHvq1Akc0GFWkDECg+lt5ZF3qw38JyiqiInATBALMAOYvTMV8XCJgG+OE+fVFHdKyOnAt/WFFGznseyCZBoNPJFRI0HtQMmlTzwZfH0cf+MLw8fvz/JYgdqZW4wpeIky6mBQSVmAAxd36PLQz6/Yt1uCfE8ImfU08x9f713Z57iZkMBtSg3CEXZH/cFYkEHQkWMt9txXKGt1gUpbGfm2KSQ6yKoIEeBGaTiapujGaDTHI1uV7Ue0pMshFKf3amQuQ25JFvdb4t3x2I4/xZvtiXTDijAAIbMQq7uRBEF12AWxFSih3gZE75HzZzlHkWl8D1qAn4KXOGxnFElOaNIAZnYsn0MvIg6cI6pyTepzZ22Gdxph4pSl72soug0puKRAUa7qlbSJyyQmqJQSuKiorATabRxXozCPvcuR2un3qgFYdNKBc7uZgvCJ3fbkQf3bQ6+hLvJmFk64+kdhMx/wNHbtttNTp4AAAAASUVORK5CYII=);
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            width: 98px;
            height: 25px;
            margin: 0 auto;
        }
    </style>
    <script>
        $(document).ready(() => {
            $('html, body').animate({
                scrollTop: $("#downloadPage").offset().top
            }, 1000);
        })
    </script>
@endsection
