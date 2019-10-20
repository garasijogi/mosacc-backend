for ($h = 0; $h < 4; $h++) {
                            if ($h == 0) {
                                $nama_menu_simpan = $nama_menu_dptt;
                                $nama_sub_simpan = $nama_sub_dptt;
                                $nominal_sub_simpan = $nominal_sub_dptt;

                                ?>
                            <tr>
                                <th colspan="4">Perubahan Aset Tidak Terikat</th>
                            </tr>
                            <tr>
                                <th colspan="4">Penerimaan Tidak Terikat</th>
                            </tr>
                        <?php
                            } elseif ($h == 1) {
                                $nama_menu_simpan = $nama_menu_kb;
                                $nama_sub_simpan = $nama_sub_kb;
                                $nominal_sub_simpan = $nominal_sub_kb;
                            } elseif ($h == 2) {
                                $nama_menu_simpan = $nama_menu;
                                $nama_sub_simpan = $nama_sub;
                                $nominal_sub_simpan = $nominal_sub;
                            } elseif ($h == 3) {
                                $nama_menu_simpan = $nama_menu_kb;
                                $nama_sub_simpan = $nama_sub_kb;
                                $nominal_sub_simpan = $nominal_sub_kb;
                            }

                            //view
                            for ($x = 0; $x < count($nama_menu_simpan); $x++) {
                                ?>
                            <tr>
                                <td colspan="3"><?php echo $nama_menu_simpan[$x]; ?></td>
                                <td><?php echo "Rp " . number_format($total[$nama_menu_simpan], 2, ',', '.'); ?></td>
                            </tr>
                            <?php
                                    for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
                                        ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $nama_sub_simpan[$x][$y]; ?></td>
                                    <td><?php if ($h == 0 || $h == 1) {
                                                        echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.');
                                                    } ?></td>
                                    <td><?php if ($h == 2 || $h == 3) {
                                                        echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.');
                                                    } ?></td>
                                <?php
                                        }
                                        ?>
                        <?php
                            }
                        }