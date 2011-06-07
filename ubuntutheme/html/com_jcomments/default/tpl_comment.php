<?
// no direct access
(defined('_VALID_MOS') OR defined('_JEXEC')) or die('Restricted access');
/*
 *
 * Comment item template. Results of rendering used in tpl_list.php
 *
 */

class jtt_tpl_comment extends JoomlaTuneTemplate {

    function render() {
        $comment = $this->getVar('comment');

        if (isset($comment)) {
            if ($this->getVar('get_comment_vote', 0) == 1) {
                // return comment vote
                $this->getCommentVoteValue($comment);
            } else if ($this->getVar('get_comment_body', 0) == 1) {
                // return only comment body (for example after quick edit)
                echo $comment->comment;
            } else {
                // return all comment item
?>





               

                    <div class="metadata">
                        <p class="author">




            <?
                $comment_number = $this->getVar('comment-number', 1);
                $thisurl = $this->getVar('thisurl', '');

                $commentBoxIndentStyle = ($this->getVar('avatar') == 1) ? ' avatar-indent' : '';

                if (isset($comment->usertype)) {
                    $commentBoxIndentStyle .= ' usertype-' . $comment->usertype;
                }

                if ($this->getVar('avatar') == 1) {
            ?>
                    <span class="comment-avatar"><? echo $comment->avatar; ?></span>
            <?
                }
            ?>

            <?
                if ($this->getVar('comment-show-vote', 0) == 1) {
                    $this->getCommentVote($comment);
                }
            ?>
                <a class="comment-anchor" href="<? echo $thisurl; ?>#comment-<? echo $comment->id; ?>" id="comment-<? echo $comment->id; ?>">#<? echo $comment_number; ?></a>

                         <?
                if (($this->getVar('comment-show-title') > 0) && ($comment->title != '')) {
            ?>
                    <span class="comment-title"><? echo $comment->title; ?></span> &mdash;
            <?
                }
                if ($this->getVar('comment-show-homepage') == 1) {
            ?>
                    <a class="author-homepage" href="<? echo $comment->homepage; ?>" rel="nofollow" title="<? echo $comment->author; ?>"><? echo $comment->author; ?></a>
            <?
                } else {
            ?>
                    <span class="comment-author"><? echo $comment->author ?></span>
            <?
                }
            ?>
                <span class="comment-date"><? echo JCommentsText::formatDate($comment->datetime, JText::_('DATETIME_FORMAT')); ?></span>
              
</p>    </div>

  <div class="comment-body" id="comment-body-<? echo $comment->id; ?>"><? echo $comment->comment; ?></div>
    

        <div class="rbox">

            <div class="comment-box<? echo $commentBoxIndentStyle; ?>">

           
            <?
                if (($this->getVar('button-reply') == 1)
                        || ($this->getVar('button-quote') == 1)
                        || ($this->getVar('button-report') == 1)) {
            ?>
                    <span class="comments-buttons">
                <?
                    if ($this->getVar('button-reply') == 1) {
                ?>
                        <a href="#" onclick="jcomments.showReply(<? echo $comment->id; ?>); return false;"><? echo JText::_('Reply'); ?></a>
                <?
                        if ($this->getVar('button-quote') == 1) {
                ?>
                            | <a href="#" onclick="jcomments.showReply(<? echo $comment->id; ?>,1); return false;"><? echo JText::_('Reply with quote'); ?></a> |
                <?
                        }
                    }
                    if ($this->getVar('button-quote') == 1) {
                ?>
                        <a href="#" onclick="jcomments.quoteComment(<? echo $comment->id; ?>); return false;"><? echo JText::_('Quote'); ?></a>
                <?
                    }
                    if ($this->getVar('button-report') == 1) {
                        if ($this->getVar('button-quote') == 1 || $this->getVar('button-reply') == 1) {
                ?>
                            |
                <?
                        }
                ?>
                        <a href="#" onclick="jcomments.reportComment(<? echo $comment->id; ?>); return false;"><? echo JText::_('Report to administrator'); ?></a>
                <?
                    }
                ?>
                </span>
            <?
                }
            ?>
            </div><div class="clear"></div>
        <?
                // show frontend moderation panel
                $this->getCommentAdministratorPanel($comment);
        ?>
            </div>
<?
            }
        }
    }

    /*
     *
     * Displays comment's administration panel
     *
     */

    function getCommentAdministratorPanel(&$comment) {
        if ($this->getVar('comments-panel-visible', 0) == 1) {
            $imagesPath = $this->getVar('template_url') . '/images';
?>
            <p class="toolbar" id="comment-toolbar-<? echo $comment->id; ?>">
    <?
            if ($this->getVar('button-edit') == 1) {
                $text = JText::_('EDIT');
                $image = $imagesPath . '/jc_edit.gif';
    ?>
                <img src="<? echo $image; ?>" onclick="jcomments.editComment(<? echo $comment->id; ?>);" alt="<? echo $text; ?>" title="<? echo $text; ?>" />
    <?
            }

            if ($this->getVar('button-delete') == 1) {
                $text = JText::_('DELETE');
                $image = $imagesPath . '/jc_delete.gif';
    ?>
                <img src="<? echo $image; ?>" onclick="if (confirm('<? echo JText::_('CONFIRM_DELETE'); ?>')){jcomments.deleteComment(<? echo $comment->id; ?>);}" alt="<? echo $text; ?>" title="<? echo $text; ?>" />
    <?
            }

            if ($this->getVar('button-publish') == 1) {
                $text = $comment->published ? JText::_('UNPUBLISH') : JText::_('PUBLISH');
                $image = $comment->published ? $imagesPath . '/jc_publish.gif' : $imagesPath . '/jc_unpublish.gif';
    ?>
                <img src="<? echo $image; ?>" onclick="jcomments.publishComment(<? echo $comment->id; ?>);" alt="<? echo $text; ?>" title="<? echo $text; ?>" />
    <?
            }

            if ($this->getVar('button-ip') == 1) {
                $text = JText::_('IP') . ' ' . $comment->ip;
                $image = $imagesPath . '/jc_ip.gif';
    ?>
                <img src="<? echo $image; ?>" onclick="jcomments.go('http://www.ripe.net/perl/whois?searchtext=<? echo $comment->ip; ?>');" alt="<? echo $text; ?>" title="<? echo $text; ?>" />
    <?
            }
    ?>
        </p>
        <div class="clear"></div>
<?
        }
    }

    function getCommentVote(&$comment) {
        $value = intval($comment->isgood) - intval($comment->ispoor);

        if ($value == 0 && $this->getVar('button-vote', 0) == 0) {
            return;
        }
?>
        <span class="comments-vote">
            <span id="comment-vote-holder-<? echo $comment->id; ?>">
        <?
        if ($this->getVar('button-vote', 0) == 1) {
        ?>
            <a href="#" class="vote-good" title="<? echo JText::_('VOTE_GOOD'); ?>" onclick="jcomments.voteComment(<? echo $comment->id; ?>, 1);return false;"></a><a href="#" class="vote-poor" title="<? echo JText::_('VOTE_POOR'); ?>" onclick="jcomments.voteComment(<? echo $comment->id; ?>, -1);return false;"></a>
        <?
        }
        echo $this->getCommentVoteValue($comment);
        ?>
    </span>
</span>
<?
    }

    function getCommentVoteValue(&$comment) {
        $value = intval($comment->isgood - $comment->ispoor);

        if ($value == 0 && $this->getVar('button-vote', 0) == 0 && $this->getVar('get_comment_vote', 0) == 0) {
            // if current value is 0 and user has no rights to vote - hide 0
            return;
        }

        if ($value < 0) {
            $class = 'poor';
        } else if ($value > 0) {
            $class = 'good';
            $value = '+' . $value;
        } else {
            $class = 'none';
        }
?>
        <span class="vote-<? echo $class; ?>"><? echo $value; ?></span>
<?
    }

}
?>