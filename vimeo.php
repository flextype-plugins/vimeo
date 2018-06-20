<?php

/**
 *
 * Flextype Vimeo Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Flextype\Component\Event\Event;

// Event: onShortcodesInitialized
Event::addListener('onShortcodesInitialized', function () {

    // Shortcode: [vimeo id="212294393"]
    Content::shortcode()->addHandler('vimeo', function(ShortcodeInterface $s) {
        return vimeo($s->getParameter('id'),
                     ((null !== $s->getParameter('width')) ? $s->getParameter('width') : 560 ),
                     ((null !== $s->getParameter('height')) ? $s->getParameter('height') : 315 ));
    });
});


function vimeo(string $id, int $width = 560, int $height = 315) : string
{
    return '<div><iframe width="'.$width.'" height="'.$height.'" src="https://player.vimeo.com/video/'.$id.'" frameborder="0"></iframe></div>';
}
