using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Schuifpuzzel
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            StartScherm();
            InitializeComponent();
        }

        readonly Button[] arrayButtonCijfers = new Button[16];
        Random r = new Random();
        List<int> listGetallen = new List<int> { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 };
        
        int intTeller = 0;
        
        public void StartScherm()
        {
            string strCijfer = "123456789101112131415";
            int j = 0;
            int k = 0;
            int l = 0;
            for (int i = 0; i < arrayButtonCijfers.Length; i++)
            {
                arrayButtonCijfers[i] = new Button();
                arrayButtonCijfers[i].BackColor = Color.Purple;
                arrayButtonCijfers[i].TextAlign = ContentAlignment.MiddleCenter;
                arrayButtonCijfers[i].Text = (i + 1).ToString();
                arrayButtonCijfers[i].ForeColor = Color.White;
                arrayButtonCijfers[i].Size = new Size(75, 75);
                arrayButtonCijfers[i].Tag = (i);
                if (i < 4)
                {
                    arrayButtonCijfers[i].Location = new Point(25 + i * 75, 45);
                }
                else if (i < 8)
                {
                    arrayButtonCijfers[i].Location = new Point(25 + j * 75, 120);
                    j++;
                }
                else if (i < 12)
                {
                    arrayButtonCijfers[i].Location = new Point(25 + k * 75, 195);
                    k++;
                }
                else
                {
                    arrayButtonCijfers[i].Location = new Point(25 + l * 75, 270);
                    l++;
                }
                if (i == 15)
                {
                    arrayButtonCijfers[i].Text = "";
                }
                arrayButtonCijfers[i].Click += ButtonOnClickArrayButtonLetter;
                this.Controls.Add(arrayButtonCijfers[i]);
            }
        }

        public void SchuifMiddelsteVier(int intIndex, string strHelp)
        {
            if (arrayButtonCijfers[intIndex - 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 1].Text;
                arrayButtonCijfers[intIndex - 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex + 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 1].Text;
                arrayButtonCijfers[intIndex + 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex - 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 4].Text;
                arrayButtonCijfers[intIndex - 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex + 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 4].Text;
                arrayButtonCijfers[intIndex + 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }

        }

        public void SchuifZijkantRechts(int intIndex, string strHelp)
        {
            if (arrayButtonCijfers[intIndex - 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 4].Text;
                arrayButtonCijfers[intIndex - 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex - 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 1].Text;
                arrayButtonCijfers[intIndex - 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex + 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 4].Text;
                arrayButtonCijfers[intIndex + 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
        }

        public void SchuifZijkantLinks(int intIndex, string strHelp)
        {
            if (arrayButtonCijfers[intIndex - 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 4].Text;
                arrayButtonCijfers[intIndex - 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex + 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 1].Text;
                arrayButtonCijfers[intIndex + 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex + 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 4].Text;
                arrayButtonCijfers[intIndex + 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
        }

        public void SchuifBovenkant(int intIndex, string strHelp)
        {
            if (arrayButtonCijfers[intIndex + 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 4].Text;
                arrayButtonCijfers[intIndex + 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex - 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 1].Text;
                arrayButtonCijfers[intIndex - 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex + 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 1].Text;
                arrayButtonCijfers[intIndex + 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
        }
        
        public void SchuifOnderkant(int intIndex, string strHelp)
        {
            if (arrayButtonCijfers[intIndex + 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex + 1].Text;
                arrayButtonCijfers[intIndex + 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex - 4].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 4].Text;
                arrayButtonCijfers[intIndex - 4].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
            if (arrayButtonCijfers[intIndex - 1].Text == "")
            {
                strHelp = arrayButtonCijfers[intIndex - 1].Text;
                arrayButtonCijfers[intIndex - 1].Text = arrayButtonCijfers[intIndex].Text;
                arrayButtonCijfers[intIndex].Text = strHelp;
            }
        }

        private void ButtonOnClickArrayButtonLetter(object sender, EventArgs eventArgs)
        {
            Button button = (Button)sender;
            //MessageBox.Show(button.Tag.ToString());
            int intIndex = int.Parse(button.Tag.ToString());
            string strHelp = "";
            intTeller++;

            switch (intIndex)
            {
                case 0:
                    if (arrayButtonCijfers[intIndex + 1].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex + 1].Text;
                        arrayButtonCijfers[intIndex + 1].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    if (arrayButtonCijfers[intIndex + 4].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex + 4].Text;
                        arrayButtonCijfers[intIndex + 4].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    break;
                case 1:
                    SchuifBovenkant(intIndex, strHelp);
                    break;
                case 2:
                    SchuifBovenkant(intIndex, strHelp);
                    break;
                case 3:
                    if (arrayButtonCijfers[intIndex - 1].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex - 1].Text;
                        arrayButtonCijfers[intIndex - 1].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    if (arrayButtonCijfers[intIndex + 4].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex + 4].Text;
                        arrayButtonCijfers[intIndex + 4].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    break;
                case 4:
                    SchuifZijkantLinks(intIndex, strHelp);
                    break;
                case 5:
                    SchuifMiddelsteVier(intIndex, strHelp);
                    break;
                case 6:
                    SchuifMiddelsteVier(intIndex, strHelp);
                    break;
                case 7:
                    SchuifZijkantRechts(intIndex, strHelp);
                    break;
                case 8:
                    SchuifZijkantLinks(intIndex, strHelp);
                    break;
                case 9:
                    SchuifMiddelsteVier(intIndex, strHelp);
                    break;
                case 10:
                    SchuifMiddelsteVier(intIndex, strHelp);
                    break;
                case 11:
                    SchuifZijkantRechts(intIndex, strHelp);
                    break;
                case 12:
                    if (arrayButtonCijfers[intIndex + 1].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex + 1].Text;
                        arrayButtonCijfers[intIndex + 1].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    if (arrayButtonCijfers[intIndex - 4].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex - 4].Text;
                        arrayButtonCijfers[intIndex - 4].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    break;
                case 13:
                    SchuifOnderkant(intIndex, strHelp);
                    break;
                case 14:
                    SchuifOnderkant(intIndex, strHelp);
                    break;
                case 15:
                    if (arrayButtonCijfers[intIndex - 1].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex - 1].Text;
                        arrayButtonCijfers[intIndex - 1].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    if (arrayButtonCijfers[intIndex - 4].Text == "")
                    {
                        strHelp = arrayButtonCijfers[intIndex - 4].Text;
                        arrayButtonCijfers[intIndex - 4].Text = arrayButtonCijfers[intIndex].Text;
                        arrayButtonCijfers[intIndex].Text = strHelp;
                    }
                    break;
            }
            TxtAantal.Text = intTeller.ToString();
            CheckPuzzel();
        }

        public void ShuffleCijfers()
        {
            for (int i = 0; i < arrayButtonCijfers.Length; i++)
            {
                if (i < 15)
                {
                    int intRandomGetal = r.Next(listGetallen.Count);
                    int intGetal = listGetallen[intRandomGetal];
                    arrayButtonCijfers[i].Text = intGetal.ToString();
                    listGetallen.Remove(intGetal);
                }
                else
                {
                    arrayButtonCijfers[i].Text = "";
                }
            }
        }

        private void NewGameToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Restart();
        }

        private void AboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("SchuifPuzzel. Probeer er voor te zorgen dat alles cijfers weer normaal komen te staan.");
        }

        private void HelpToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void ExitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            ShuffleCijfers();
        }

        private void ResetToolStripMenuItem_Click(object sender, EventArgs e)
        {
            intTeller = 0;
        }

        private void CheckPuzzel()
        {
            int intCheck = 0;
            for(int i = 0; i < 14; i++)
            {
                if(arrayButtonCijfers[i + 1].Tag.ToString() == arrayButtonCijfers[i].Text)
                {
                    intCheck++;
                }
            }
            if(intCheck == 14)
            {
                MessageBox.Show("U hebt het opgelost!");
            }
        }
    }
}
