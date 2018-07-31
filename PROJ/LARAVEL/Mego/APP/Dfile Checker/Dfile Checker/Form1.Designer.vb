<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class Form1
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Me.FolderBrowserDialog1 = New System.Windows.Forms.FolderBrowserDialog()
        Me.btnBrowse = New System.Windows.Forms.Button()
        Me.txtDirrectory = New System.Windows.Forms.TextBox()
        Me.btnCheck = New System.Windows.Forms.Button()
        Me.btnReset = New System.Windows.Forms.Button()
        Me.txtCheck = New System.Windows.Forms.TextBox()
        Me.SuspendLayout()
        '
        'btnBrowse
        '
        Me.btnBrowse.Location = New System.Drawing.Point(348, 9)
        Me.btnBrowse.Name = "btnBrowse"
        Me.btnBrowse.Size = New System.Drawing.Size(75, 23)
        Me.btnBrowse.TabIndex = 0
        Me.btnBrowse.Text = "Browse.."
        Me.btnBrowse.UseVisualStyleBackColor = True
        '
        'txtDirrectory
        '
        Me.txtDirrectory.Location = New System.Drawing.Point(12, 12)
        Me.txtDirrectory.Name = "txtDirrectory"
        Me.txtDirrectory.ReadOnly = True
        Me.txtDirrectory.Size = New System.Drawing.Size(330, 20)
        Me.txtDirrectory.TabIndex = 1
        '
        'btnCheck
        '
        Me.btnCheck.Enabled = False
        Me.btnCheck.Location = New System.Drawing.Point(429, 9)
        Me.btnCheck.Name = "btnCheck"
        Me.btnCheck.Size = New System.Drawing.Size(75, 23)
        Me.btnCheck.TabIndex = 2
        Me.btnCheck.Text = "Check "
        Me.btnCheck.UseVisualStyleBackColor = True
        '
        'btnReset
        '
        Me.btnReset.Enabled = False
        Me.btnReset.Location = New System.Drawing.Point(510, 9)
        Me.btnReset.Name = "btnReset"
        Me.btnReset.Size = New System.Drawing.Size(75, 23)
        Me.btnReset.TabIndex = 4
        Me.btnReset.Text = "Reset"
        Me.btnReset.UseVisualStyleBackColor = True
        '
        'txtCheck
        '
        Me.txtCheck.BackColor = System.Drawing.SystemColors.ButtonHighlight
        Me.txtCheck.Location = New System.Drawing.Point(13, 38)
        Me.txtCheck.Multiline = True
        Me.txtCheck.Name = "txtCheck"
        Me.txtCheck.ReadOnly = True
        Me.txtCheck.Size = New System.Drawing.Size(572, 336)
        Me.txtCheck.TabIndex = 5
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(597, 386)
        Me.Controls.Add(Me.txtCheck)
        Me.Controls.Add(Me.btnReset)
        Me.Controls.Add(Me.btnCheck)
        Me.Controls.Add(Me.txtDirrectory)
        Me.Controls.Add(Me.btnBrowse)
        Me.Name = "Form1"
        Me.Text = "Form1"
        Me.ResumeLayout(False)
        Me.PerformLayout()

    End Sub
    Friend WithEvents FolderBrowserDialog1 As System.Windows.Forms.FolderBrowserDialog
    Friend WithEvents btnBrowse As System.Windows.Forms.Button
    Friend WithEvents txtDirrectory As System.Windows.Forms.TextBox
    Friend WithEvents btnCheck As System.Windows.Forms.Button
    Friend WithEvents btnReset As System.Windows.Forms.Button
    Friend WithEvents txtCheck As System.Windows.Forms.TextBox

End Class
