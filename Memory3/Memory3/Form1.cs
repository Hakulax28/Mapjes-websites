using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Memory3
{
    public partial class GameWindow : Form
    {
        //int score = 0;
        Random location = new Random();
        //List<int> X = new List<int>();
        //List<int> Y = new List<int>();
        List<Point> points = new List<Point>();

        int intPicNumber;
        string strImage1, strImage2;

        PictureBox PendingImage1;
        PictureBox PendingImage2;

        // een array maken die bestaat uit pictureboxen
        PictureBox[] arrayPictureBoxKaart = new PictureBox[48];

        public GameWindow()
        {
            InitializeComponent();
        }

        readonly Random random = new Random();
        private void GameWindow_Load(object sender, EventArgs e)
        {
            intPicNumber = random.Next(1, 24);
            
            int intRij = 0, intKolom = 15;
            int intTeller = 0;
            for (int i = 0; i < arrayPictureBoxKaart.Length; i++)
            {
                arrayPictureBoxKaart[i] = new PictureBox();

                arrayPictureBoxKaart[i].Size = new Size(80, 120);
                arrayPictureBoxKaart[i].SizeMode = PictureBoxSizeMode.Zoom;
                arrayPictureBoxKaart[i].Tag = i % 24;
                arrayPictureBoxKaart[i].Load("Images/" + (i % 24).ToString() + ".png");
                arrayPictureBoxKaart[i].Click += OnClick;
                if (intTeller < 8)
                {
                    arrayPictureBoxKaart[i].Location = new Point(100 + intRij * 80, intKolom);
                    intRij++;
                }
                else
                {
                    intTeller = 0;
                    intRij = 0;
                    intKolom += 125;
                    arrayPictureBoxKaart[i].Location = new Point(100 + intRij * 80, intKolom);
                    intRij++;
                }
                this.Controls.Add(arrayPictureBoxKaart[i]);
                intTeller++;
            }
            
            label1.Text = "5";
            ScoreCount.Text = Convert.ToString(0);
            try
            {
                foreach (PictureBox picture in arrayPictureBoxKaart)
                {
                    picture.Enabled = false;
                    points.Add(picture.Location);
                }
            }
            catch { };

            try
            {
                foreach (PictureBox picture in arrayPictureBoxKaart)
                {
                    int next = location.Next(points.Count);
                    Point p = points[next];
                    picture.Location = p;
                    points.Remove(p);
                }
            }
            catch { };
            
            timer2.Start();
            timer1.Start();
        }
        //bijna perfect, soms werkt het niet.
        private void OnClick(object sender, EventArgs eventArgs)
        {
            PictureBox pictureBox = (PictureBox)sender;
            pictureBox.Load("Images/" + (pictureBox.Tag).ToString() + ".png");
            if (PendingImage1 == null)
            {
                PendingImage1 = pictureBox;
                strImage1 = (PendingImage1.Tag).ToString();
            }
            else if (PendingImage1 != null && PendingImage2 == null)
            {
                PendingImage2 = pictureBox;
                strImage2 = (PendingImage2.Tag).ToString();
            }
            if (PendingImage1 != null && PendingImage2 != null)
            {
                if (strImage1 == strImage2)
                {
                    PendingImage1 = null;
                    PendingImage2 = null;
                    pictureBox.Enabled = false;
                    arrayPictureBoxKaart[int.Parse(strImage1) - 1].Enabled = false;
                    arrayPictureBoxKaart[int.Parse(strImage2) - 1 + 24].Enabled = false;
                    ScoreCount.Text = Convert.ToString(Convert.ToInt32(ScoreCount.Text) + 10);
                }
                else
                {
                    ScoreCount.Text = Convert.ToString(Convert.ToInt32(ScoreCount.Text) - 10);
                    timer3.Start();
                }
            }
        }

        private void timer2_Tick_1(object sender, EventArgs e)
        {
            int timer = Convert.ToInt32(label1.Text);
            timer -= 1;
            label1.Text = Convert.ToString(timer);
            if (timer == 0)
            {
                timer2.Stop();
            }
        }
        //bijna perfect.
        private void timer1_Tick_1(object sender, EventArgs e)
        {
            timer1.Stop();
            try
            {
                foreach (PictureBox picture in arrayPictureBoxKaart)
                {
                    picture.Enabled = true;
                    picture.Cursor = Cursors.Hand;
                    picture.Load("Images/" + (25).ToString() + ".png");
                }
            }
            catch { };
        }

        private void timer3_Tick_1(object sender, EventArgs e)
        {
            timer3.Stop();
            PendingImage1.Load("Images/" + (25).ToString() + ".png");
            PendingImage2.Load("Images/" + (25).ToString() + ".png");
            PendingImage1 = null;
            PendingImage2 = null;
        }
        //De button moet resetten, maar hij werkt niet echt.
        private void button1_Click_1(object sender, EventArgs e)
        {
            Application.Restart();
            GameWindow_Load(sender, e);
        }
    }
}
