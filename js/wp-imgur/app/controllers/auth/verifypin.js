import Ember from 'ember';
import auth from 'wp-imgur/models/auth';
import Notice from 'wp-imgur/models/notice';
import pages from 'wp-imgur/models/pages';
import I18n from '../../ext/ember_i18n';

var VerifyPinController = Ember.ObjectController.extend({
  verifying: false,

  actions: {
    verifyPin: function(button) {
      if (this.get('verifying')) {
        return;
      }

      var self = this;
      var promise = auth.verifyPin();
      this.set('verifying', true);

      button.waitFor(promise);
      Notice.showAfter(promise, I18n.t('status.authorize.success'));

      promise.then(function() {
        pages.set('lockEnabled', false);
        self.transitionToRoute('auth.authorized');
      })
      .finally(function() {
        self.set('verifying', false);
      });
    }
  }
});

export default VerifyPinController;
