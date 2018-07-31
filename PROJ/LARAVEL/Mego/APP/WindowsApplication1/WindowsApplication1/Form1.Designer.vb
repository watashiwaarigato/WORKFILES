<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class frmMego
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
        Me.wbWindow = New System.Windows.Forms.WebBrowser()
        Me.SuspendLayout()
        '
        'wbWindow
        '
        Me.wbWindow.Dock = System.Windows.Forms.DockStyle.Fill
        Me.wbWindow.Location = New System.Drawing.Point(0, 0)
        Me.wbWindow.MinimumSize = New System.Drawing.Size(20, 20)
        Me.wbWindow.Name = "wbWindow"
        Me.wbWindow.Size = New System.Drawing.Size(294, 457)
        Me.wbWindow.TabIndex = 0
        '
        'frmMego
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(294, 457)
        Me.Controls.Add(Me.wbWindow)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow
        Me.Name = "frmMego"
        Me.Text = "Mego"
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents wbWindow As System.Windows.Forms.WebBrowser

End Class
