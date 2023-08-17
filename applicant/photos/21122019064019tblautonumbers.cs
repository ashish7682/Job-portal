using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Db_multistore_second_option
{
    #region Tblautonumbers
    public class Tblautonumbers
    {
        #region Member Variables
        protected int _AUTOID;
        protected string _AUTOSTART;
        protected int _AUTOEND;
        protected int _AUTOINC;
        protected string _AUTOKEY;
        #endregion
        #region Constructors
        public Tblautonumbers() { }
        public Tblautonumbers(string AUTOSTART, int AUTOEND, int AUTOINC, string AUTOKEY)
        {
            this._AUTOSTART=AUTOSTART;
            this._AUTOEND=AUTOEND;
            this._AUTOINC=AUTOINC;
            this._AUTOKEY=AUTOKEY;
        }
        #endregion
        #region Public Properties
        public virtual int AUTOID
        {
            get {return _AUTOID;}
            set {_AUTOID=value;}
        }
        public virtual string AUTOSTART
        {
            get {return _AUTOSTART;}
            set {_AUTOSTART=value;}
        }
        public virtual int AUTOEND
        {
            get {return _AUTOEND;}
            set {_AUTOEND=value;}
        }
        public virtual int AUTOINC
        {
            get {return _AUTOINC;}
            set {_AUTOINC=value;}
        }
        public virtual string AUTOKEY
        {
            get {return _AUTOKEY;}
            set {_AUTOKEY=value;}
        }
        #endregion
    }
    #endregion
}